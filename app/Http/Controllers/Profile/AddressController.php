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
        $city = Http::withHeaders([
            'key' => '1f78e5921ca72104fbb74fae37d5acd0'
        ])->get('https://api.rajaongkir.com/starter/city');

        $provincy = Http::withHeaders([
            'key' => '1f78e5921ca72104fbb74fae37d5acd0'
        ])->get('https://api.rajaongkir.com/starter/province');

        $origins = $city['rajaongkir'];
        $provincies = $provincy['rajaongkir'];

        $addresses = Auth::user()->addresses;

        return view('profile.address', [
            'provincies' => $provincies,
            'origins' => $origins,
            'addresses' => $addresses
        ]);
    }

    public function create()
    {

        $city = Http::withHeaders([
            'key' => config('rajaongkir.api_key')
        ])->get('https://api.rajaongkir.com/starter/city');

        $province = Http::withHeaders([
            'key' => config('rajaongkir.api_key')
        ])->get('https://api.rajaongkir.com/starter/province');

        $cities = $city['rajaongkir']['results'];
        $provincies = $province['rajaongkir']['results'];

        return view('profile.address-create', ['cities' => $cities, 'provincies' => $provincies]);
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

        $cityResponse = Http::withHeaders([
            'key' => config('rajaongkir.api_key'),
        ])->get("https://api.rajaongkir.com/starter/city?id={$request->city}");
        $provinceResponse = Http::withHeaders([
            'key' => config('rajaongkir.api_key'),
        ])->get("https://api.rajaongkir.com/starter/province?id={$request->province}");

        // dd($provinceResponse->json());

        if ($cityResponse->successful()) {
            $cityDetails = $cityResponse['rajaongkir']['results'];
            $provinceDetails = $provinceResponse['rajaongkir']['results'];

            $address = new Address();
            $address->user_id = Auth::id();
            $address->address = $request->address;
            $address->city_id = $cityDetails['city_id'];
            $address->city = $cityDetails['city_name'];
            $address->province = $provinceDetails['province'];
            $address->postal_code = $request->postal_code;
            $address->phone = $request->phone;
            $address->save();

            return redirect()->route('address.index');
        }
    }

    public function select($userId)
    {
        $user = Auth::user();
        $user->addresses()->update(['is_selected' => false]);
        $user->addresses()->where('id', $userId)->update(['is_selected' => true]);

        return redirect()->back();
    }

    public function destroy(string $userId)
    {
        $address = Address::find($userId);
        $address->delete();

        return redirect()->route('address.index');
    }
}
