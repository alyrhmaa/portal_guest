<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    // Halaman edit profil user
    public function edit()
    {
        $user = Auth::user();
        return view('pages.user.profile', compact('user'));
    }

    // Proses update profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'profile_picture' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika upload foto baru
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        // Update data lain
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}
