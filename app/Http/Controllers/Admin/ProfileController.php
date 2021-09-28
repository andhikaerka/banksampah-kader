<?php

namespace App\Http\Controllers\Admin;

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
        $admin = User::find(auth()->user()->id);

        if (
            $admin->province_id and
            $admin->city_id and
            $admin->district_id and
            $admin->village_id
        ) {
            $provinces = \Indonesia::allProvinces();
            $cities = \Indonesia::findProvince($admin->province_id, ['cities'])->cities;
            $districts = \Indonesia::findCity($admin->city_id, ['districts'])->districts;
            $villages = \Indonesia::findDistrict($admin->district_id, ['villages'])->villages;
        } else {
            $provinces = \Indonesia::allProvinces();
            $cities = [];
            $districts = [];
            $villages = [];
        }

        return view('admin.profile', compact(
            'admin',
            'provinces',
            'cities',
            'districts',
            'villages',
        ));
    }
}
