<?php

namespace App\Http\Controllers\Admin\Master;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\BarangStore;
use App\Http\Requests\BarangUpdate;
use App\Models\Barang;
use App\Models\BarangKategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangList = Barang::all();

        return view('admin.master-barang.index', compact('barangList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriList = BarangKategori::all();

        return view('admin.master-barang.create', compact('kategoriList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarangStore $request, Barang $barang)
    {
        $barang->nama = $request->nama;
        $barang->kategori_id = $request->kategori;
        $barang->created_by = auth()->user()->id;

        $barang->save();

        Alert::success('Tambah Barang '.$request->nama, 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.barang.index');
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
    public function edit(Barang $barang)
    {
        $kategoriList = BarangKategori::all();

        return view('admin.master-barang.edit', compact('kategoriList', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BarangUpdate $request, Barang $barang)
    {
        $barang->nama = $request->nama;
        $barang->kategori_id = $request->kategori;
        $barang->created_by = auth()->user()->id;

        $barang->save();

        Alert::success('Ubah Barang', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        Alert::success('Hapus Barang', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.barang.index');
    }
}
