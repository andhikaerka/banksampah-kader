<?php

namespace App\Http\Controllers\Admin\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penggunaList = User::whereHas('roles', function($q){ 
            $q->where('name', 'pengguna'); 
        })->get();

        return view('admin.pengguna.index', compact('penggunaList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $pengguna)
    {
        return view('admin.pengguna.show', compact('pengguna'));
    }
}
