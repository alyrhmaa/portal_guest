<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 🧍‍♂️ Tampilkan profil user yang login
    public function profil()
    {
        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login dulu!');
        }

        return view('pages.user.profil', compact('user'));
    }

    // ✏️ Form edit profil
    public function edit()
    {
        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login dulu!');
        }

        return view('pages.user.edit', compact('user'));
    }

    // 💾 Simpan update profil
    public function update(Request $request)
    {
        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login dulu!');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:4',
        ]);

        $dbUser = User::find($user->id);
        $dbUser->name = $request->name;
        $dbUser->email = $request->email;

        if ($request->filled('password')) {
            $dbUser->password = Hash::make($request->password);
        }

        $dbUser->save();

        // update juga session biar ikut ke-refresh
        Session::put('user', $dbUser);

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
