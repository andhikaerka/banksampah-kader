<?php

namespace App\Http\Controllers\Pengguna;

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
        $kaderTotal = User::whereHas('roles', function($q){
            $q->where('name', 'kader'); 
        })
        ->where('bank_sampah_id', auth()->user()->bank_sampah_id)
        ->count();

        $kaderisasiTotal = User::whereHas('roles', function($q){
            $q->where('name', 'kader'); 
        })
        ->whereNotIn('created_by', [auth()->user()->id])
        ->where('bank_sampah_id', auth()->user()->bank_sampah_id)
        ->count();

        $plastikTotal = KaderSetoran::whereHas('barang.kategori', function($q){
            $q->where('nama', 'plastik'); 
        })
        ->whereHas('created_user', function($q){
            $q->where('bank_sampah_id', auth()->user()->bank_sampah_id); 
        })
        ->sum('jumlah');

        $nonPlastikTotal = KaderSetoran::whereHas('barang.kategori', function($q){
            $q->where('nama', 'non plastik'); 
        })
        ->whereHas('created_user', function($q){
            $q->where('bank_sampah_id', auth()->user()->bank_sampah_id); 
        })
        ->sum('jumlah');

        return view('pengguna.dashboard', compact(
            'kaderTotal',
            'kaderisasiTotal',
            'plastikTotal',
            'nonPlastikTotal'
        ));
    }
}
