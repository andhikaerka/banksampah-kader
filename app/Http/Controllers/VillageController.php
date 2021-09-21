<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VillageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($district)
    {
        $district = \Indonesia::findDistrict($district, ['villages']);

        return response()->json([
            'data' => $district->villages
        ]);
    }
}
