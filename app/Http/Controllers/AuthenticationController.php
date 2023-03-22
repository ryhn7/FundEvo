<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticationController extends Controller
{
    public function index()
    {
        return view('authentication.login', []);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // return redirect()->intended('/Dashboard/SPBU');

            if (Auth::user()->role_id === 1) {
                return redirect()->intended('/Dashboard/SPBU');
            } else if (Auth::user()->role_id === 2) {
                return redirect()->intended('/penjualan-bbm');
            } else if (Auth::user()->role_id === 3) {
                return redirect()->intended('/penjualan-item');
            } else {
                return redirect()->intended('/Dashboard/SPBU');
            }
        }

        return back()->with('loginError', 'Login anda gagal. Harap coba kembali.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
