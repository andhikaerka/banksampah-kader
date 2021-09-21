<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\BankSampah;
use App\Models\PenggunaKategori;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $pengguna = User::find(auth()->user()->id);

        if (
            auth()->user()->province_id and
            auth()->user()->city_id and
            auth()->user()->district_id and
            auth()->user()->village_id
        ) {
            $provinces = \Indonesia::allProvinces();
            $cities = \Indonesia::findProvince(auth()->user()->province_id, ['cities'])->cities;
            $districts = \Indonesia::findCity(auth()->user()->city_id, ['districts'])->districts;
            $villages = \Indonesia::findDistrict(auth()->user()->district_id, ['villages'])->villages;
        } else {
            $provinces = \Indonesia::allProvinces();
            $cities = null;
            $districts = null;
            $villages = null;
        }

        $bankSampahList = BankSampah::all();
        $penggunaKategoriList = PenggunaKategori::all();

        return view('pengguna.profile', compact(
            'pengguna',
            'provinces',
            'cities',
            'districts',
            'villages',
            'bankSampahList',
            'penggunaKategoriList'
        ));
    }
}
