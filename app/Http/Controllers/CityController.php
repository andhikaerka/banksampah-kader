<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($province)
    {
        $province = \Indonesia::findProvince($province, ['cities']);

        return response()->json([
            'data' => $province->cities
        ]);
    }
}
