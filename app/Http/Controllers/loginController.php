<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPos;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $user = UserPos::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            // Alihkan ke halaman sukses login (dengan animasi)
            return view('auth.success', ['name' => $user->name]);
        }

        return back()->with('error', 'Email atau password salah');
    }
}
