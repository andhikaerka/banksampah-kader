<?php

namespace App\Http\Controllers\Pengguna;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\PenggunaProfileUpdate;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ProfileUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(PenggunaProfileUpdate $request)
    {
        
        $user = User::find(auth()->user()->id);

        // update all user on that bank sampah
        $kaderUpdateAll = DB::table('users')
        ->whereNotNull('bank_sampah_id')
        ->where('bank_sampah_id', $user->bank_sampah_id)
        ->update(array(
            'bank_sampah_id' => $request->bank_sampah
        ));

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
        $user->bank_sampah_id = $request->bank_sampah;
        $user->pengguna_profile_status = 1;
        $user->updated_at = Carbon::now();

        $user->save();

        Alert::success('Ubah Pengguna Profile', 'Berhasil')
        ->persistent(true)
        ->autoClose(2000);

        return redirect()->route('pengguna.profile');
    }
}
