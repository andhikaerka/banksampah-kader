<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
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
    public function __invoke(Request $request)
    {
        $kader = User::find(auth()->user()->id);

        if (
            $kader->province_id and
            $kader->city_id and
            $kader->district_id and
            $kader->village_id
        ) {
            $provinces = \Indonesia::allProvinces();
            $cities = \Indonesia::findProvince($kader->province_id, ['cities'])->cities;
            $districts = \Indonesia::findCity($kader->city_id, ['districts'])->districts;
            $villages = \Indonesia::findDistrict($kader->district_id, ['villages'])->villages;
        } else {
            $provinces = \Indonesia::allProvinces();
            $cities = [];
            $districts = [];
            $villages = [];
        }

        return view('kader.profile', compact(
            'kader',
            'provinces',
            'cities',
            'districts',
            'villages',
        ));
    }
}
