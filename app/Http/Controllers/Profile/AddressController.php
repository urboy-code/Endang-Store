<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    public function index()
    {
        

        return view('profile.address', compact('addresses'));
    }

    public function create()
    {
        

        // dd($provincies);

        return view('profile.address-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'postal_code' => 'required|string',
            'phone' => 'required|string',
        ]);

        $address = new Address();
        $address->user_id = Auth::id();
        $address->address = $request->address;
        $address->city = $request->city;
        $address->province = $request->province;
        $address->postal_code = $request->postal_code;
        $address->phone = $request->phone;
        $address->save();

        return redirect()->route('address.index');
    }
}
