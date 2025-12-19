<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // FORM REGISTER
    public function showRegister()
    {
        return view('pages.auth.register');
    }

    // FORM LOGIN
    public function showLogin()
    {
        return view('pages.auth.login');
    }

    // PROSES REGISTER
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|confirmed|min:4',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

   // PROSES LOGIN
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // ✅ Update last_login
        Auth::user()->update(['last_login' => now()]);

        // ✅ Simpan di session
        Session::put('user', Auth::user());

        return redirect()->route('user.index')->with('success', 'Berhasil login!');
    }

    return back()->with('error', 'Email atau password salah!');
}

    // LOGOUT - FIXED
    public function logout(Request $request)
    {
        // ✅ Hapus session user
        Session::forget('user');

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda berhasil logout!');
    }
}
