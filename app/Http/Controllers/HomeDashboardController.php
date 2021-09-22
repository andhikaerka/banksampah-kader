<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if(auth()->user()->hasRole('admin')){
           return redirect()->route('admin.dashboard');
        }

        if(auth()->user()->hasRole('pengguna')){
            return redirect()->route('pengguna.dashboard');
        }

        if(auth()->user()->hasRole('kader')){
            return redirect()->route('kader.dashboard');
        }
    }
}
