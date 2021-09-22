<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use App\Models\KaderSetoran;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $kaderisasiTotal = User::whereHas('roles', function($q){
            $q->where('name', 'kader'); 
        })
        ->where('created_by', auth()->user()->id)
        ->where('bank_sampah_id', auth()->user()->bank_sampah_id)
        ->count();

        $plastikTotal = KaderSetoran::whereHas('barang.kategori', function($q){
            $q->where('nama', 'plastik'); 
        })
        ->where('created_by', auth()->user()->id)
        ->sum('jumlah');

        $nonPlastikTotal = KaderSetoran::whereHas('barang.kategori', function($q){
            $q->where('nama', 'non plastik'); 
        })
        ->where('created_by', auth()->user()->id)
        ->sum('jumlah');

        return view('kader.dashboard', compact(
            'kaderisasiTotal',
            'plastikTotal',
            'nonPlastikTotal'
        ));
    }
}
