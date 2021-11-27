<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
use App\Models\KaderSetoran;
use App\Models\Sponsor;
use App\Models\User;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $bankSampahTotal = BankSampah::count();

        $penggunaList =  User::whereHas('roles', function($q){
            $q->where('name', 'pengguna'); 
        })
        ->pluck('id')
        ->toArray();

        $kaderTotal = User::whereHas('roles', function($q){
            $q->where('name', 'kader'); 
        })
        ->whereIn('created_by', $penggunaList)
        ->count();

        $kaderisasiTotal = User::whereHas('roles', function($q){
            $q->where('name', 'kader'); 
        })
        ->whereNotIn('created_by', $penggunaList)
        ->count();
        
        $nasabahTotal = User::whereHas('roles', function($q){
            $q->where('name', 'kader');
        })
        ->whereHas('setoran')
        ->count();

        $plastikTotal = KaderSetoran::whereHas('barang.kategori', function($q){
            $q->where('nama', 'plastik'); 
        })
        ->sum('jumlah');

        $nonPlastikTotal = KaderSetoran::whereHas('barang.kategori', function($q){
            $q->where('nama', 'non plastik'); 
        })
        ->sum('jumlah');

        $sponsorHeaderMenuList = Sponsor::where('lokasi', 'header-menu')->get();
        
        $sponsorSponsorSectionList = Sponsor::where('lokasi', 'sponsor-section')->get();

        return view('homepage', compact(
            'bankSampahTotal',
            'nasabahTotal',
            'kaderisasiTotal',
            'kaderTotal',
            'plastikTotal',
            'nonPlastikTotal',
            'sponsorHeaderMenuList',
            'sponsorSponsorSectionList'
        ));
    }
}
