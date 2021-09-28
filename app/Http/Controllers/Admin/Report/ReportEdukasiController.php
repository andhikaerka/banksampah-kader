<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\BankSampah;
use App\Models\KaderKategori;
use App\Models\KaderSetoran;
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
        $bankSampahList = BankSampah::with('setoran')
        ->with('setoran.created_user.kader_kategori')
        ->with('setoran.created_user.created_user.roles')
        ->get();

        $setoranTotal = KaderSetoran::with('created_user.kader_kategori')->get();

        $kategoriList = KaderKategori::all();

        $setoranTahunList = KaderSetoran::select(DB::raw('YEAR(created_at) as year'))
        ->distinct()
        ->get()
        ->pluck('year');

        return view('admin.laporan.edukasi.index', compact(
            'bankSampahList',
            'kategoriList',
            'setoranTotal',
            'setoranTahunList'
        ));
    }
}
