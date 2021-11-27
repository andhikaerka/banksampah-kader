<?php

namespace App\Http\Controllers\Admin\Sponsor;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\SponsorStore;
use App\Http\Requests\SponsorUpdate;
use App\Models\Sponsor;
use File;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsorList = Sponsor::all();

        return view('admin.sponsor.index', compact('sponsorList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SponsorStore $request, Sponsor $sponsor)
    {
        $sponsor->judul = $request->judul;
        $sponsor->lokasi = $request->lokasi;
        $sponsor->url = $request->url;
        $sponsor->alt_text = $request->alt_text;
        $sponsor->created_by = auth()->user()->id;

        if ($request->file('gambar')) {
            
            // upload gambar sponsor
            $name = $request->file('gambar')->getClientOriginalName();
            $dir = $request->file('gambar')->move('sponsor', $name);
            
            $sponsor->gambar = $name;
        }

        $sponsor->save();

        Alert::success('Tambah Sponsor', 'Berhasil')->persistent(true)->autoClose(2000);

        return redirect()->route('admin.sponsor.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsor.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SponsorUpdate $request, Sponsor $sponsor)
    {
        $sponsor->judul = $request->judul;
        $sponsor->lokasi = $request->lokasi;
        $sponsor->url = $request->url;
        $sponsor->alt_text = $request->alt_text;
        $sponsor->created_by = auth()->user()->id;

        if ($request->file('gambar')) {
            File::delete(public_path('/sponsor/'.$sponsor->gambar));

            // upload gambar sponsor
            $name = $request->file('gambar')->getClientOriginalName();
            
            $request->file('gambar')->move('sponsor', $name);
            
            $sponsor->gambar = $name;
        }

        $sponsor->save();

        Alert::success('Tambah Sponsor', 'Berhasil')->persistent(true)->autoClose(2000);

        return redirect()->route('admin.sponsor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        File::delete(public_path('/sponsor/'.$sponsor->gambar));

        $sponsor->delete();

        Alert::success('Hapus Sponsor', 'Berhasil')->persistent(true)->autoClose(2000);

        return redirect()->route('admin.sponsor.index');
    }
}
