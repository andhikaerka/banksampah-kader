<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdminApprove
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // cek jika profile user sudah lengkap atau belum
        $pengguna_approval = auth()->user()->approval_status;

        if ($pengguna_approval == 'setuju') {
            // Lolos ke next route
            return $next($request);
        }

        if ($pengguna_approval == 'tidak disetujui') {
            // JIKA TIDAK DISETUJUI OLEH ADMIN
            return redirect()->route('pengguna.profile')->with(['status' => 'Data Anda Tidak Disetujui oleh Admin']);
        }
        
        // JIKA BELUM MAKA LENGKAPI PROFILE DULU
        return redirect()->route('pengguna.profile')->with(['status' => 'Data Anda Belum Disetujui Admin']);
    }
}
