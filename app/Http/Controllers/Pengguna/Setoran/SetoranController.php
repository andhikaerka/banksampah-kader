<?php

namespace App\Http\Controllers\Pengguna\Setoran;

use App\Http\Controllers\Controller;
use App\Models\KaderSetoran;
use Illuminate\Http\Request;

class SetoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kaderSetoranList = KaderSetoran::select('barang_id', 'created_by')
        ->selectRaw("SUM(jumlah) as jumlah")
        ->whereHas('created_user', function($q) {
            $q->where('bank_sampah_id', auth()->user()->bank_sampah_id);
        })
        ->when(request('tahun'), function($q) use ($request) {
            $q->whereYear('created_at', $request->tahun);
        })
        ->when(request('bulan'), function($q) use ($request) {
            $q->whereMonth('created_at', $request->bulan);
        })
        ->with(['barang', 'barang.kategori'])
        ->groupBy('barang_id', 'created_by')
        ->orderBy('created_by', 'ASC')
        ->orderBy('barang_id', 'ASC')
        ->get();

        $sampahTotal = KaderSetoran::whereHas('created_user', function($q) {
            $q->where('bank_sampah_id', auth()->user()->bank_sampah_id);
        })
        ->sum('jumlah');

        $sampahPlastikTotal = KaderSetoran::whereHas('created_user', function($q) {
            $q->where('bank_sampah_id', auth()->user()->bank_sampah_id);
        })
        ->whereHas('barang.kategori', function($q) {
            $q->where('nama', 'plastik');
        })
        ->sum('jumlah');

        $sampahNonPlastikTotal = KaderSetoran::whereHas('created_user', function($q) {
            $q->where('bank_sampah_id', auth()->user()->bank_sampah_id);
        })
        ->whereHas('barang.kategori', function($q) {
            $q->where('nama', 'non plastik');
        })
        ->sum('jumlah');

        $tahunList = KaderSetoran::selectRaw('DISTINCT YEAR(created_at) AS tahun')
        ->get()
        ->pluck('tahun');

        return view('pengguna.setoran.index', compact(
            'kaderSetoranList',
            'sampahTotal',
            'sampahPlastikTotal',
            'sampahNonPlastikTotal',
            'tahunList'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
