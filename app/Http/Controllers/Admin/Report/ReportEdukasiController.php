<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\BankSampah;
use App\Models\KaderKategori;
use App\Models\PenggunaKategori;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class ReportEdukasiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $bankSampahList = BankSampah::with('kader')
        ->with('kader.roles')
        ->with('kader.created_user')
        ->with('kader.created_user.roles')
        ->when(request('kategori'), function($q) use ($request) {
            $q->whereHas('kader', function($query) use ($request) {
                $query->whereIn('users.pengguna_kategori_id', $request->kategori);
            });
        })
        ->when(request('tahun'), function($q) use ($request) {
            $q->whereHas('kader', function($q) use ($request) {
                $q->whereYear('users.created_at', $request->tahun);
            });
        })
        ->get();

        // dd($bankSampahList);

        $kaderTotal = User::with('created_user.kader_kategori')->get();

        $kategoriList = KaderKategori::all();

        $kaderTahunList = User::select(DB::raw('YEAR(created_at) as year'))
        ->distinct()
        ->get()
        ->pluck('year');

        $penggunaKategoriList = PenggunaKategori::all();

        return view('admin.laporan.edukasi.index', compact(
            'bankSampahList',
            'kategoriList',
            'kaderTotal',
            'kaderTahunList',
            'penggunaKategoriList'
        ));
    }
}
