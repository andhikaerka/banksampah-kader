<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($city)
    {
        $city = \Indonesia::findCity($city, ['districts']);

        return response()->json([
            'data' => $city->districts
        ]);
    }
}
