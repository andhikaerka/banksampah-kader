<?php

namespace App\Http\Controllers\Pengguna\Kader;

use App\Http\Controllers\Controller;
use App\Models\User;
use DomPDF;
use Illuminate\Http\Request;

class KaderExportPDFController extends Controller
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
        
        $kaderList = User::whereHas('roles', function ($q) {
            $q->where('name', 'kader');
        })
        ->where('bank_sampah_id', auth()->user()->bank_sampah_id)
        ->when(request('tahun'), function($q) use ($request) {
            $q->whereYear('created_at', $request->tahun);
        })
        ->when(request('bulan'), function($q) use ($request) {
            $q->whereMonth('created_at', $request->bulan);
        })
        ->get();

        $bank_sampah_nama = auth()->user()->bank_sampah->nama;

        // GENERATE PDF START
        $pdf = DomPDF::loadView('pengguna.kader.export-pdf', compact(
            'kaderList',
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

        return $pdf->download('report_kader'.date('Y-m-d H:i:s').'.pdf');
    }
}
