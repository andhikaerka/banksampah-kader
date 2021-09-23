<?php

namespace App\Http\Controllers\Pengguna\Setoran;

use App\Http\Controllers\Controller;
use App\Models\KaderSetoran;
use DomPDF;
use Illuminate\Http\Request;

class SetoranExportPDFController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        
        $kaderSetoranList = KaderSetoran::select('barang_id', 'created_by')
        ->selectRaw("SUM(jumlah) as jumlah")
        ->whereHas('created_user', function($q) {
            $q->where('bank_sampah_id', auth()->user()->bank_sampah_id);
        })
        ->when(request('tahun'), function($q) use ($request) {
            $q->whereYear('created_at', $request->tahun);
        })
        ->when(request('bulan'), function($q) use ($request) {
            $q->whereMonth('created_at', $request->bulan);
        })
        ->with(['barang', 'barang.kategori'])
        ->groupBy('barang_id', 'created_by')
        ->orderBy('created_by', 'ASC')
        ->orderBy('barang_id', 'ASC')
        ->get();

        $sampahTotal = KaderSetoran::whereHas('created_user', function($q) {
            $q->where('bank_sampah_id', auth()->user()->bank_sampah_id);
        })
        ->sum('jumlah');

        $sampahPlastikTotal = KaderSetoran::whereHas('created_user', function($q) {
            $q->where('bank_sampah_id', auth()->user()->bank_sampah_id);
        })
        ->whereHas('barang.kategori', function($q) {
            $q->where('nama', 'plastik');
        })
        ->sum('jumlah');

        $sampahNonPlastikTotal = KaderSetoran::whereHas('created_user', function($q) {
            $q->where('bank_sampah_id', auth()->user()->bank_sampah_id);
        })
        ->whereHas('barang.kategori', function($q) {
            $q->where('nama', 'non plastik');
        })
        ->sum('jumlah');

        $bank_sampah_nama = auth()->user()->bank_sampah->nama;

        // GENERATE PDF START
        $pdf = DomPDF::loadView('pengguna.setoran.export-pdf', compact(
            'kaderSetoranList',
            'sampahTotal',
            'sampahPlastikTotal',
            'sampahNonPlastikTotal',
            'tahun',
            'bulan',
            'bank_sampah_nama'
        ));

        $pdf->setOptions([
            'isPhpEnabled' => true,
            'isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true,
            'tempDir' => public_path(),
            'chroot'  => public_path(),
        ]);

        return $pdf->download('setoran_kader'.date('Y-m-d H:i:s').'.pdf');
    }
}
