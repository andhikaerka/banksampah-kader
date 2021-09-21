<?php

namespace App\Http\Controllers\Admin\Pengguna;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\PenggunaKategoriStore;
use App\Http\Requests\PenggunaKategoriUpdate;
use App\Models\PenggunaKategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriList = PenggunaKategori::all();

        return view('admin.pengguna.kategori.index', compact('kategoriList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengguna.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenggunaKategoriStore $request, PenggunaKategori $pengguna_kategori)
    {
        $pengguna_kategori->nama = $request->nama;
        $pengguna_kategori->created_by = auth()->user()->id;

        $pengguna_kategori->save();
        
        Alert::success('Tambah Kategori', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.pengguna-kategori.index');
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
    public function edit(PenggunaKategori $pengguna_kategori)
    {
        return view('admin.pengguna.kategori.edit', compact('pengguna_kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenggunaKategoriUpdate $request, PenggunaKategori $pengguna_kategori)
    {
        $pengguna_kategori->nama = $request->nama;
        $pengguna_kategori->created_by = auth()->user()->id;

        $pengguna_kategori->save();
        
        Alert::success('Ubah Kategori', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.pengguna-kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenggunaKategori $pengguna_kategori)
    {
        $pengguna_kategori->delete();
        
        Alert::success('Hapus Kategori', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.pengguna-kategori.index');
    }
}
