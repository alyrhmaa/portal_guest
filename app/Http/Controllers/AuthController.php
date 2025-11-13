<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // ✅ Tampilkan form register
    public function showRegister()
    {
        return view('pages.auth.register');
    }

    // ✅ Tampilkan form login
    public function showLogin()
    {
        return view('pages.auth.login');
    }

    // ✅ Proses register
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

    // ✅ Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // ✅ Simpan sesi login
            Session::put('user', $user);

            // ✅ Simpan waktu terakhir login ke database
            $user->last_login = now();
            $user->save();

            return redirect()->route('user.index')->with('success', 'Berhasil login!');
        }

        return redirect()->back()->with('error', 'Email atau password salah!');
    }

    // ✅ Logout
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login')->with('success', 'Anda berhasil logout!');
    }
}
