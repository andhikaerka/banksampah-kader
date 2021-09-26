<?php

namespace App\Http\Controllers\Kader\Kaderisasi;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\KaderStatus;
use App\Models\User;
use App\Services\KaderService;
use Illuminate\Http\Request;

class KaderisasiController extends Controller
{
    protected $kaderService;

    public function __construct(KaderService $kaderService)
    {
        $this->kaderService = $kaderService;
    }

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
    public function store(Request $request)
    {
        $this->kaderService->save($request->all());

        Alert::success('Tambah Kader', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);

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
    public function update(Request $request, $id)
    {
        $this->kaderService->update($request->all(), $id);
        
        Alert::success('Ubah Kader', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);

        return redirect()->route('kader.kaderisasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->kaderService->delete($id);

        Alert::success('Hapus Kader', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);

        return redirect()->route('kader.kaderisasi.index');
    }
}
