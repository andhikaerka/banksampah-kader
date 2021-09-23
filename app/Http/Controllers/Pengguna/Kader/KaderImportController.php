<?php

namespace App\Http\Controllers\Pengguna\Kader;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\PenggunaKaderImportStore;
use App\Imports\KaderImport;
use Excel;
use Illuminate\Http\Request;
use Session;

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
        $import = new KaderImport(
            auth()->user()->id,
            auth()->user()->bank_sampah_id,
            auth()->user()->kader_kategoti_id
        );
        Excel::import($import, $request->file('file'));

        $failures = $import->failures();
 
        // notifikasi dengan session
        Alert::success('Import Kader', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);

        if($failures){
            Session::flash('result', $failures);
        }
 
        // alihkan halaman kembali
        return redirect()->route('pengguna.kader.index');
    }
}
