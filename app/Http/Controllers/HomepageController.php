<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
use App\Models\KabupatenKota;
use App\Models\KaderKategori;
use App\Models\KaderSetoran;
use App\Models\Provinsi;
use App\Models\Sponsor;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

    public function show(Request $request)
    {
        $sponsorHeaderMenuList = Sponsor::where('lokasi', 'header-menu')->get();
        
        $sponsorSponsorSectionList = Sponsor::where('lokasi', 'sponsor-section')->get();

        $kaderKategoriList = KaderKategori::all();

        // FOR TABLE
        $bankSampahTable = BankSampah::with([
            'kader',
            'setoran'
        ])
        ->withCount([
            'kader' => function($query) use ($request) {
                $query->whereHas('roles', function($q) {
                    $q->where('name', 'kader');
                });
                
                $penggunaBankSampah = User::whereHas('roles', function($q2) {
                    $q2->where('name', 'pengguna');
                })->get()->pluck('id')->toArray();

                $query->whereIn('created_by', $penggunaBankSampah);

                $query->when(request('tahun'), function($q) use ($request) {
                    $q->whereYear('created_at', $request->tahun);
                });
            },
            'kaderisasi' => function($query) use ($request) {
                $query->whereHas('roles', function($q){
                    $q->where('name', 'kader');
                });
                
                $penggunaBankSampah = User::whereHas('roles', function($q2) {
                    $q2->where('name', 'pengguna');
                })->get()->pluck('id')->toArray();

                $query->whereNotIn('created_by', $penggunaBankSampah);

                $query->when(request('tahun'), function($q) use ($request) {
                    $q->whereYear('created_at', $request->tahun);
                });
            },
            'nasabah' => function($query) use ($request) {
                $query->whereHas('roles', function($q){
                    $q->where('name', 'kader');
                })
                ->whereHas('setoran');

                $query->when(request('tahun'), function($q) use ($request) {
                    $q->whereYear('created_at', $request->tahun);
                });
            }
        ])
        ->withSum('setoran', 'jumlah')
        ->withSum(['setoran_plastik' => function($query) {
            $query->whereHas('barang.kategori', function($q){
                $q->where('nama', 'plastik'); 
            });
        }], 'jumlah')
        ->withSum(['setoran_non_plastik' => function($query) {
            $query->whereHas('barang.kategori', function($q){
                $q->where('nama', 'non plastik'); 
            });
        }], 'jumlah')
        ->when(request('provinsi'), function($q) use ($request) {
            $q->where('province_id', $request->provinsi);
        })
        ->when(request('kabupaten_kota'), function($q) use ($request) {
            $q->where('city_id', $request->kabupaten_kota);
        })
        ->paginate(10);
        
        $bankSampahListProvinsidanKota = BankSampah::select('province_id', 'city_id')
        ->distinct('province_id', 'city_id')
        ->get();

        $provinces = Provinsi::select('id', 'name')
        ->whereIn('id', $bankSampahListProvinsidanKota->pluck('province_id')->toArray())
        ->get();

        $cities = KabupatenKota::select('id', 'name')
        ->whereIn('id', $bankSampahListProvinsidanKota->pluck('city_id')->toArray())
        ->get();

        $tahunSetoranList = KaderSetoran::select(DB::raw('YEAR(created_at) AS tahun'))
        ->distinct()
        ->orderBy('tahun', 'desc')
        ->get();

        return view('homepage-detail', compact(
            'sponsorHeaderMenuList',
            'sponsorSponsorSectionList',
            'bankSampahTable',
            'provinces',
            'cities',
            'tahunSetoranList',
            'kaderKategoriList'
        ));
    }
}
