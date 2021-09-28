<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\BankSampah;
use App\Models\BarangKategori;
use App\Models\KaderSetoran;
use DB;
use Illuminate\Http\Request;

class ReportAdiwiyataController extends Controller
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
        ->get();

        $setoranTotal = KaderSetoran::with('barang.kategori')->get();

        $kategoriList = BarangKategori::all();

        $setoranTahunList = KaderSetoran::select(DB::raw('YEAR(created_at) as year'))
        ->distinct()
        ->get()
        ->pluck('year');

        return view('admin.laporan.adiwiyata.index', compact(
            'bankSampahList',
            'kategoriList',
            'setoranTotal',
            'setoranTahunList'
        ));
    }
}
