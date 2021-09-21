<?php

namespace App\Http\Controllers\Admin\Kader;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\KaderStatusStore;
use App\Http\Requests\KaderStatusUpdate;
use App\Models\KaderStatus;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kaderStatusList = KaderStatus::all();

        return view('admin.kader.status.index', compact('kaderStatusList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kader.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaderStatusStore $request, KaderStatus $kader_status)
    {
        $kader_status->nama = $request->nama;
        $kader_status->created_by = auth()->user()->id;

        $kader_status->save();

        Alert::success('Tambah Kader Status', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.kader-status.index');
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
    public function edit(KaderStatus $kader_status)
    {
        return view('admin.kader.status.edit', compact('kader_status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KaderStatusUpdate $request, KaderStatus $kader_status)
    {
        $kader_status->nama = $request->nama;
        $kader_status->created_by = auth()->user()->id;

        $kader_status->save();

        Alert::success('Ubah Kader Status', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.kader-status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KaderStatus $kader_status)
    {
        $kader_status->delete();

        Alert::success('Hapus Kader Status', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.kader-status.index');
    }
}
