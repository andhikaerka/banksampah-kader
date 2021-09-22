<?php

namespace App\Http\Controllers\Pengguna\Kader;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\PenggunaKaderImportStore;
use App\Imports\KaderImport;
use Excel;
use Illuminate\Http\Request;

class KaderImportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.kader.create-import');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenggunaKaderImportStore $request)
    { 
		// import data
		Excel::import(new KaderImport(auth()->user()->id), $request->file('file'));
 
		// notifikasi dengan session
		Alert::success('Import Kader', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);
 
		// alihkan halaman kembali
		return redirect()->route('pengguna.kader.index');
    }
}
