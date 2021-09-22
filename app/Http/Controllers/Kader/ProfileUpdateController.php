<?php

namespace App\Http\Controllers\Kader;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\KaderProfileUpdate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(KaderProfileUpdate $request)
    {
        $user = User::find(auth()->user()->id);

        $user->name = $request->nama;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->province_id = $request->provinsi;
        $user->city_id = $request->kabupaten_kota;
        $user->district_id = $request->kecamatan;
        $user->village_id = $request->desa_kelurahan;
        $user->kode_pos = $request->kode_pos;
        $user->pengguna_profile_status = 1;
        $user->updated_at = Carbon::now();

        $user->save();

        Alert::success('Ubah Kader Profile', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);

        return redirect()->route('kader.profile');
    }
}
