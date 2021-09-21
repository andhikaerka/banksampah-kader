<?php

namespace App\Http\Controllers\Admin\Kader;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\KaderKategoriStore;
use App\Http\Requests\KaderKategoriUpdate;
use App\Models\KaderKategori;
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
        $kaderKategoriList = KaderKategori::all();

        return view('admin.kader.kategori.index', compact('kaderKategoriList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kader.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaderKategoriStore $request, KaderKategori $kader_kategori)
    {
        $kader_kategori->nama = $request->nama;
        $kader_kategori->created_by = auth()->user()->id;

        $kader_kategori->save();

        Alert::success('Tambah Kader Kategori', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.kader-kategori.index');
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
    public function edit(KaderKategori $kader_kategori)
    {
        return view('admin.kader.kategori.edit', compact('kader_kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KaderKategoriUpdate $request, KaderKategori $kader_kategori)
    {
        $kader_kategori->nama = $request->nama;
        $kader_kategori->created_by = auth()->user()->id;

        $kader_kategori->save();

        Alert::success('Ubah Kader Kategori', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.kader-kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KaderKategori $kader_kategori)
    {
        $kader_kategori->delete();

        Alert::success('Hapus Kader Kategori', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.kader-kategori.index');
    }
}
