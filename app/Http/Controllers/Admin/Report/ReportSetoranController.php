<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\BankSampah;
use App\Models\BarangKategori;
use App\Models\KabupatenKota;
use App\Models\KaderSetoran;
use App\Models\PenggunaKategori;
use App\Models\Provinsi;
use DB;
use Illuminate\Http\Request;

class ReportSetoranController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
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

        $setoranTahunList = KaderSetoran::select(DB::raw('YEAR(created_at) as year'))
        ->distinct()
        ->get()
        ->pluck('year');

        $penggunaKategoriList = PenggunaKategori::all();

        $bankSampahListProvinsidanKota = BankSampah::select('province_id', 'city_id')
        ->distinct('province_id', 'city_id')
        ->get();

        $provinces = Provinsi::select('id', 'name')
        ->whereIn('id', $bankSampahListProvinsidanKota->pluck('province_id')->toArray())
        ->get();

        $cities = KabupatenKota::select('id', 'name')
        ->whereIn('id', $bankSampahListProvinsidanKota->pluck('city_id')->toArray())
        ->get();

        return view('admin.laporan.setoran.index', compact(
            'bankSampahList',
            'kategoriList',
            'setoranTotal',
            'setoranTahunList',
            'penggunaKategoriList',
            'provinces',
            'cities'
        ));
    }
}
