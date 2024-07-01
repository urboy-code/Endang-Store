<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::where('role', 'user')->get();
        return view('dashboard.user', compact('users'));
    }

    public function destroy(string $id)
    {
        $product = User::findOrFail($id);
        $product->delete();

        return redirect()->route('user.index');
    }
}
