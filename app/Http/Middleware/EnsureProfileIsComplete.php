<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileIsComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (empty($user->alamat) || empty($user->phone) || empty($user->negara) || empty($user->kota) || empty($user->kode_pos)) {
            return redirect()->route('profile.edit')->with('error', 'Please complete your profile before proceeding to checkout.');
            
        }


        return $next($request);
    }
}
