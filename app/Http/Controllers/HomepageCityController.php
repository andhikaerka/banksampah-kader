<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;

class HomepageCityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($province = NULL)
    {
        if($province) {
            $bankSampahCity = BankSampah::where('province_id', $province)
            ->distinct()
            ->get()
            ->pluck('city_id')
            ->toArray();
        } else {
            $bankSampahCity = BankSampah::distinct()
            ->get()
            ->pluck('city_id')
            ->toArray();
        }
        

        $cities = City::whereIn('id', $bankSampahCity)->select('id', 'name')->get();

        return response()->json([
            'data' => $cities
        ]);
    }
}
