<?php

namespace App\Http\Controllers\Admin\Master;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\BarangBeratStore;
use App\Http\Requests\BarangBeratUpdate;
use App\Models\BarangBerat;
use Illuminate\Http\Request;

class BarangBeratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangBeratList = BarangBerat::all();

        return view('admin.master-barang-berat.index', compact('barangBeratList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master-barang-berat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarangBeratStore $request, BarangBerat $barang_berat)
    {
        $barang_berat->nama = $request->nama;
        $barang_berat->pengali = $request->pengali;
        $barang_berat->created_by = auth()->user()->id;

        $barang_berat->save();

        Alert::success('Tambah Barang Berat', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.barang-berat.index');
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
    public function edit(BarangBerat $barang_berat)
    {
        return view('admin.master-barang-berat.edit', compact('barang_berat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BarangBeratUpdate $request, BarangBerat $barang_berat)
    {
        $barang_berat->nama = $request->nama;
        $barang_berat->pengali = $request->pengali;
        $barang_berat->created_by = auth()->user()->id;

        $barang_berat->save();

        Alert::success('Ubah Barang Berat', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.barang-berat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangBerat $barang_berat)
    {
        $barang_berat->delete();

        Alert::success('Hapus Barang Berat', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.barang-berat.index');
    }
}
