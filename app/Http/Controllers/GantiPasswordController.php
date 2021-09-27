<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests\GantiPasswordStore;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class GantiPasswordController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ganti-password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GantiPasswordStore $request)
    {
        $user = User::find(auth()->user()->id);

        if (Hash::check($request->password_lama, $user->password)) {
            // UPDATE PASSWORD BARU
            $user->password = Hash::make($request->password_baru);
            $user->save();

            Alert::success('Ganti Password', 'Berhasil')
            ->persistent(true)
            ->autoClose(2000);
        } else {
            Alert::error('Ganti Password Gagal', 'Password Lama Salah')
            ->persistent(true)
            ->autoClose(2000);
        }
        
        return redirect()->route('ganti.password'); 
    }
}
