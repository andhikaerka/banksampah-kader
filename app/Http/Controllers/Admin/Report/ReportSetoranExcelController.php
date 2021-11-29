<?php

namespace App\Http\Controllers\Admin\Report;

use App\Exports\BankSampahSetoranExport;
use App\Http\Controllers\Controller;
use App\Models\BankSampah;
use App\Models\BarangKategori;
use App\Models\KaderSetoran;
use App\Models\PenggunaKategori;
use DB;
use Excel;
use Illuminate\Http\Request;

class ReportSetoranExcelController extends Controller
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
        $provinsi = $request->provinsi;
        $kabupaten_kota = $request->kabupaten_kota;

        $bankSampahList = BankSampah::with('setoran')
        ->with('setoran.barang.kategori')
        ->with('setoran.created_user.created_user')
        ->when(request('kategori'), function($q) use ($request) {
            $q->whereHas('setoran.created_user.created_user', function($q) use ($request) {
                $q->whereIn('pengguna_kategori_id', $request->kategori);
            });
        })
        ->when(request('tahun'), function($q) use ($request) {
            $q->whereHas('setoran', function($q) use ($request) {
                $q->whereYear('kader_setoran.created_at', $request->tahun);
            });
        })
        ->when(request('provinsi'), function($q) use ($request) {
            $q->where('province_id', $request->provinsi);
        })
        ->when(request('kabupaten_kota'), function($q) use ($request) {
            $q->where('city_id', $request->kabupaten_kota);
        })
        ->get();

        $setoranTotal = KaderSetoran::with('barang.kategori')->get();

        $kategoriList = BarangKategori::all();

        $penggunaKategoriList = PenggunaKategori::all();

        // GENERATE EXCEL START
        return Excel::download(new BankSampahSetoranExport(
            $tahun,
            $provinsi,
            $kabupaten_kota,
            $bankSampahList,
            $kategoriList,
            $setoranTotal,
            $penggunaKategoriList
        ), 'bank_sampah_setoran_'.$request->tahun.'.xls');
    }
}
