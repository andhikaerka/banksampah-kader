<?php

namespace App\Http\Controllers\Admin\Pengguna;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\KaderKategori;
use App\Models\PenggunaKategori;
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
        })
        ->with('bank_sampah')
        ->with('pengguna_kategori')
        ->with('created_user')
        ->with('approved_user')
        ->get();

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
        $kaderKategoriList = KaderKategori::all();
        $penggunaKategoriList = PenggunaKategori::all();

        return view('admin.pengguna.show', compact(
            'pengguna',
            'kaderKategoriList',
            'penggunaKategoriList'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        $pengguna->delete();

        Alert::success('Hapus Pengguna', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);
        
        return redirect()->route('admin.pengguna.index');
    }
}
