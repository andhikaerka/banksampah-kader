<?php

namespace App\Http\Controllers\Admin\Master;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\BankSampahStore;
use App\Models\BankSampah;
use Illuminate\Http\Request;

class BankSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankSampahList = BankSampah::all();

        return view('admin.master-bank-sampah.index', compact('bankSampahList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master-bank-sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankSampahStore $request, BankSampah $bankSampah)
    {
        $bankSampah->nama = $request->nama;
        $bankSampah->created_by = auth()->user()->id;

        $bankSampah->save();

        Alert::success('Tambah Bank Sampah', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.bank-sampah.index');
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
        return view('admin.master-bank-sampah.edit');
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
