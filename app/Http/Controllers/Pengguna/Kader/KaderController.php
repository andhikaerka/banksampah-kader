<?php

namespace App\Http\Controllers\Pengguna\Kader;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\PenggunaKaderStore;
use App\Http\Requests\PenggunaKaderUpdate;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\KaderService;

class KaderController extends Controller
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
        $kaderList = User::whereHas('roles', function ($q) {
            $q->where('name', 'kader');
        })
        ->where('bank_sampah_id', auth()->user()->bank_sampah_id)
        ->get();

        return view('pengguna.kader.index', compact('kaderList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.kader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenggunaKaderStore $request)
    {
        $this->kaderService->save($request->all());
        
        Alert::success('Tambah Kader', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);
        
        return redirect()->route('pengguna.kader.index');
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
    public function edit(User $kader)
    {
        return view('pengguna.kader.edit', compact('kader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenggunaKaderUpdate $request, $id)
    {
        $this->kaderService->update($request->all(), $id);
        
        Alert::success('Ubah Kader', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);

        return redirect()->route('pengguna.kader.index');
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

        return redirect()->route('pengguna.kader.index');
    }
}
