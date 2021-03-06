<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isProfileComplete
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
        $user_profile_status = auth()->user()->pengguna_profile_status;

        if ($user_profile_status) {
            // Lolos ke next route
            return $next($request);
        }
        
        // JIKA BELUM MAKA LENGKAPI PROFILE DULU
        return redirect()->route('pengguna.profile')->with(['status' => 'Mohon Lengkapi Profile Anda']);
    }
}
