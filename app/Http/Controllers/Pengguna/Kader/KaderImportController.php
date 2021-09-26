<?php

namespace App\Http\Controllers\Pengguna\Kader;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\PenggunaKaderImportStore;
use App\Imports\KaderImport;
use App\Services\KaderService;
use Excel;
use Illuminate\Http\Request;
use Session;

class KaderImportController extends Controller
{
    protected $kaderService;

    public function __construct(KaderService $kaderService)
    {
        $this->kaderService = $kaderService;
    }

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
        $import = new KaderImport($this->kaderService);

        Excel::import($import, $request->file('file'));
        // dd($import->userList);

        $failures = $import->failures();

        if (!$failures->isEmpty()) {
            // notifikasi dengan session
            Session::flash('result', $failures);
        }
 
        Alert::success('Import Kader', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);
 
        // alihkan halaman kembali
        return redirect()->route('pengguna.kader.index');
    }
}
