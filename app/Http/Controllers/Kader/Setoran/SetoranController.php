<?php

namespace App\Http\Controllers\Kader\Setoran;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\KaderSetoranStore;
use App\Models\Barang;
use App\Models\BarangBerat;
use App\Models\KaderSetoran;
use Illuminate\Http\Request;

class SetoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setoranList = KaderSetoran::with('barang')
        ->with('barang_berat')
        ->where('created_by', auth()->user()->id)
        ->get();

        $barangList = Barang::all();
        $barangBeratList = BarangBerat::all();

        return view('kader.setoran.index', compact(
            'setoranList',
            'barangList',
            'barangBeratList',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kader.setoran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaderSetoranStore $request, KaderSetoran $setoran)
    {
        $berat_satuan = BarangBerat::find($request->berat_satuan);
        
        $setoran->barang_id = $request->barang;
        $setoran->jumlah = $request->jumlah * (float) $berat_satuan->pengali;
        $setoran->berat_satuan_id = $request->berat_satuan;
        $setoran->created_by = auth()->user()->id;

        $setoran->save();

        Alert::success('Tambah Setoran', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('kader.setoran.index');
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
    public function destroy(KaderSetoran $setoran)
    {
        $setoran->delete();

        Alert::success('Hapus Setoran', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('kader.setoran.index');
    }
}
