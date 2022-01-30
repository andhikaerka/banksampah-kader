<?php

namespace App\Http\Controllers\Kader\Setoran;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\KaderSetoranStore;
use App\Models\Barang;
use App\Models\BarangBerat;
use App\Models\KaderSetoran;
use App\Models\User;
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
        // hitung jumlah kaderisasi
        $kaderisasiTotal = User::whereHas('roles', function($q){ 
            $q->where('name', 'kader'); 
        })
        ->where('created_by', auth()->user()->id)
        ->count();

        $setoranAttempt = KaderSetoran::where('created_by', auth()->user()->id)
        ->count();

        // JIKA KADER BELUM 1, MAKA TIDAK BISA BUAT SETORAN KE-1
        if ($kaderisasiTotal <= 1) {
            Alert::error('Jumlah Kaderisasi Kurang', 'Minimal punya 1 kader')
            ->persistent(true)
            ->autoClose(4000);

            return redirect()->route('kader.setoran.index');
        } else {
            if ($setoranAttempt < 1) {
                // JIKA SUDAH MAKA BISA BUAT SETORAN KE-1
                return $this->save($request, $setoran);
            }
        }

        // JIKA KADER BELUM 2, MAKA TIDAK BISA BUAT SETORAN KE-2
        if (($kaderisasiTotal >= 2 && $setoranAttempt == 1) && $kaderisasiTotal < 3) {
            Alert::error('Jumlah Kaderisasi Kurang', 'Yuk ajakin 1 kader baru :)')
            ->persistent(true)
            ->autoClose(4000);

            return redirect()->route('kader.setoran.index');
        } else {
            if ($setoranAttempt < 2) {
                // JIKA SUDAH MAKA BISA BUAT SETORAN KE-2
                return $this->save($request, $setoran);
            }
        }

        if (($kaderisasiTotal >= 3 && $setoranAttempt == 2) && $kaderisasiTotal < 4) {
            Alert::error('Jumlah Kaderisasi Kurang', 'Nah sekarang lengkapi 1 lagi ya :D')
            ->persistent(true)
            ->autoClose(4000);

            return redirect()->route('kader.setoran.index');
        } else {
            if ($setoranAttempt < 3) {
                // JIKA SUDAH MAKA BISA BUAT SETORAN KE-3
                return $this->save($request, $setoran);
            }
        }

        // JIKA SUDAH PUNYA KADER MINIMAL 4, MAKA BISA BUAT SETORAN SELAMANYA
        if ($kaderisasiTotal >= 4) {
            return $this->save($request, $setoran);
        }

        return redirect()->route('kader.setoran.index');
    }

    // SIMPAN SETORAN KE DB
    public function save(Request $request, KaderSetoran $setoran)
    {
        $berat_satuan = BarangBerat::find($request->berat_satuan);
        
        $setoran->barang_id = $request->barang;
        $setoran->jumlah = $request->jumlah * (float) $berat_satuan->pengali;
        $setoran->berat_satuan_id = $request->berat_satuan;
        $setoran->created_by = auth()->user()->id;

        $setoran->save();

        
        Alert::success('Tambah Setoran', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);

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

        Alert::success('Hapus Setoran', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);
        
        return redirect()->route('kader.setoran.index');
    }
}
