<?php

namespace App\Http\Controllers\Admin\Master;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\BankSampahStore;
use App\Http\Requests\BankSampahUpdate;
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
        $bankSampahList = BankSampah::with('provinsi')
        ->with('kabupaten_kota')
        ->get();

        return view('admin.master-bank-sampah.index', compact('bankSampahList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = \Indonesia::allProvinces();
        $cities = [];

        return view('admin.master-bank-sampah.create', compact(
            'provinces',
            'cities'
        ));
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
        $bankSampah->province_id = $request->provinsi;
        $bankSampah->city_id = $request->kabupaten_kota;
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
    public function edit(BankSampah $bankSampah)
    {
        if (
            $bankSampah->province_id and
            $bankSampah->city_id
        ) {
            $provinces = \Indonesia::allProvinces();
            $cities = \Indonesia::findProvince($bankSampah->province_id, ['cities'])->cities;
        } else {
            $provinces = \Indonesia::allProvinces();
            $cities = [];
        }

        return view('admin.master-bank-sampah.edit', compact(
            'bankSampah',
            'provinces',
            'cities'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BankSampahUpdate $request, BankSampah $bankSampah)
    {
        $bankSampah->nama = $request->nama;
        $bankSampah->province_id = $request->provinsi;
        $bankSampah->city_id = $request->kabupaten_kota;
        $bankSampah->created_by = auth()->user()->id;

        $bankSampah->save();

        Alert::success('Ubah Bank Sampah', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.bank-sampah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankSampah $bankSampah)
    {
        $bankSampah->delete();

        Alert::success('Hapus Bank Sampah', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.bank-sampah.index');
    }
}
