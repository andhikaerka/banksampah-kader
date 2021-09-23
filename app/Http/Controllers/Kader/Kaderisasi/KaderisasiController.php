<?php

namespace App\Http\Controllers\Kader\Kaderisasi;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\KaderStatus;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Password;

class KaderisasiController extends Controller
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
        ->where('created_by', auth()->user()->id)
        ->get();

        return view('kader.kaderisasi.index', compact('kaderList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statusHubunganList = KaderStatus::all();

        return view('kader.kaderisasi.create', compact('statusHubunganList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $kaderisasi)
    {
        $kaderisasi->name = $request->nama;
        $kaderisasi->email = $request->email;
        $kaderisasi->telepon = $request->telepon;
        $kaderisasi->alamat = $request->alamat;
        $kaderisasi->kader_status_id = $request->status_hubungan;
        $kaderisasi->kader_kategori_id = auth()->user()->kader_kategori_id;
        $kaderisasi->bank_sampah_id = auth()->user()->bank_sampah_id;
        $kaderisasi->created_by = auth()->user()->id;
        $kaderisasi->password = Hash::make($request['telepon']);

        $kaderisasi->save();

        $kaderisasi->assignRole('kader');

        $token = Password::getRepository()->create($kaderisasi);
        $kaderisasi->sendPasswordResetNotification($token);

        Alert::success('Tambah Kader', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('kader.kaderisasi.index');
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
    public function edit(User $kaderisasi)
    {
        $statusHubunganList = KaderStatus::all();

        return view('kader.kaderisasi.create', compact(
            'statusHubunganList',
            'kaderisasi'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $kaderisasi)
    {
        $kaderisasi->nama = $request->nama;
        $kaderisasi->email = $request->nama;
        $kaderisasi->telepon = $request->nama;
        $kaderisasi->alamat = $request->nama;
        $kaderisasi->status = $request->nama;
        $kaderisasi->created_by = auth()->user()->id;

        $kaderisasi->save();

        Alert::success('Ubah Kader', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('kader.kaderisasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $kaderisasi)
    {
        $kaderisasi->delete();

        Alert::success('Hapus Kader', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('kader.kaderisasi.index');
    }
}
