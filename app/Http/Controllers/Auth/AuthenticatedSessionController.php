<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Muat Cart dari database
        $userId = Auth::id();
        $cartData = Cart::where('user_id', $userId)->first();
        if($cartData){
            Session::put('cart', json_decode($cartData->cart_data, true));
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->intended(route('dashboard.index'));
        }
        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $userId = auth()->user()->id;
        $cart = Session::get('cart', []);
        Cart::updateOrCreate(['user_id' => $userId], ['cart_data' => json_encode($cart)]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
