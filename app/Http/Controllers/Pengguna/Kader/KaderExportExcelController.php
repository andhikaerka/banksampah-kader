<?php

namespace App\Http\Controllers\Pengguna\Kader;

use App\Exports\KaderListExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Excel;
use Illuminate\Http\Request;

class KaderExportExcelController extends Controller
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

        // GENERATE EXCEL START
        return Excel::download(new KaderListExport(
            $kaderList,
            $bulan,
            $tahun,
            $bank_sampah_nama
        ), 'report_kader_'.bulan($bulan).'_'.$tahun.'.xls');
    }
}
