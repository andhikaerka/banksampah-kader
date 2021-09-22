<?php

namespace App\Http\Controllers\Pengguna\Kader;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kaderList = User::whereHas('roles', function($q){
            $q->where('name', 'kader'); 
        })
        ->where('bank_sampah_id', auth()->user()->bank_sampah_id)
        ->get();

        return view('pengguna.kader.index', compact('kaderList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.kader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $kader)
    {
        $kader->name = $request->nama;
        $kader->email = $request->email;
        $kader->telepon = $request->telepon;
        $kader->alamat = $request->alamat;
        $kader->password = Hash::make($request->telepon);
        $kader->bank_sampah_id = auth()->user()->bank_sampah_id;
        $kader->kader_kategori_id = auth()->user()->kader_kategori_id;
        $kader->created_by = auth()->user()->id;

        $kader->save();

        $kader->assignRole('kader');
        
        Alert::success('Tambah Kader', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('pengguna.kader.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
