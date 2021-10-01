<?php

namespace App\Http\Controllers\Admin\Pengguna;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPenggunaApprovalStore;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class PenggunaApprovalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AdminPenggunaApprovalStore $request, User $pengguna)
    {
        // save pengguna
        $pengguna->approved_at = Carbon::now();
        $pengguna->approved_by = auth()->user()->id;
        $pengguna->approval_status = $request->approval;
        $pengguna->pengguna_kategori_id = $request->kategori_pengguna;
        $pengguna->kader_kategori_id = $request->kategori_kader;

        $pengguna->save();

        // update all user on that bank sampah
        $kaderUpdateAll = DB::table('users')
        ->whereNotNull('bank_sampah_id')
        ->whereNotNull('kader_kategori_id')
        ->where('bank_sampah_id', $pengguna->bank_sampah_id)
        ->update(array(
            'kader_kategori_id' => $request->kategori_kader
        ));

        Alert::success('Approval Pengguna', 'Berhasil')->persistent(true)->autoClose(2000);
        return redirect()->route('admin.pengguna.index');
    }
}
