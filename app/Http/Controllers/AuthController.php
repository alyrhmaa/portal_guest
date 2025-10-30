<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    // ✅ Tampilkan form register
    public function showRegister()
    {
        return view('guest.register');
    }

    // ✅ Tampilkan form login
    public function showLogin()
    {
        return view('guest.login');
    }

    // ✅ Proses register
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|confirmed|min:4',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ✅ Proses login
    public function login(Request $request)
    {
       $request->validate([
        'email' => ['required', 'required'],
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Session::put('user', $user);
        return redirect()->route('profil.index')->with('success', 'Login berhasil!');
    }

    return back()->with('error', 'Username atau password salah.');
    }

    // ✅ Logout
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login')->with('success', 'Anda berhasil logout!');
    }
}
