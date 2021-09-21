<?php

namespace App\Http\Controllers\Admin\Master;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\BarangKategoriStore;
use App\Http\Requests\BarangKategoriUpdate;
use App\Models\BarangKategori;
use Illuminate\Http\Request;

class BarangKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriList = BarangKategori::all();

        return view('admin.master-barang-kategori.index', compact('kategoriList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master-barang-kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarangKategoriStore $request, BarangKategori $barang_kategori)
    {
        $barang_kategori->nama = $request->nama;
        $barang_kategori->created_by = auth()->user()->id;

        $barang_kategori->save();

        Alert::success('Tambah Kategori', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.barang-kategori.index');
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
    public function edit(BarangKategori $barang_kategori)
    {
        return view('admin.master-barang-kategori.edit', compact('barang_kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BarangKategoriUpdate $request, BarangKategori $barang_kategori)
    {
        $barang_kategori->nama = $request->nama;
        $barang_kategori->created_by = auth()->user()->id;

        $barang_kategori->save();

        Alert::success('Ubah Kategori', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.barang-kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangKategori $barang_kategori)
    {
        $barang_kategori->delete();

        Alert::success('Hapus Kategori', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.barang-kategori.index');
    }
}
