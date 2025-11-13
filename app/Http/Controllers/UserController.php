<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // 📋 Tampilkan semua user (seperti halaman Data User)
    public function index()
    {
        // urut dari yang pertama kali login (created_at paling awal)
        $users = User::orderBy('created_at', 'asc')->get();
        $currentUser = Session::get('user');

        return view('pages.user.index', compact('users', 'currentUser'));
    }

    // 🧍‍♂️ Profil user yang login (edit profil sendiri)
    public function profil()
    {
        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login dulu!');
        }

        return view('pages.user.profil', compact('user'));
    }

    // 💾 Simpan update profil
    public function update(Request $request)
    {
        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login dulu!');
        }

        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email'    => 'required|email',
            'password' => 'nullable|min:4',
        ]);

        $dbUser = User::find($user->id);
        $dbUser->name = $request->name;
        $dbUser->username = $request->username;
        $dbUser->email = $request->email;

        if ($request->filled('password')) {
            $dbUser->password = Hash::make($request->password);
        }

        $dbUser->save();
        Session::put('user', $dbUser);

        return redirect()->route('profil.user')->with('success', 'Profil berhasil diperbarui!');
    }

    // 🧾 Form tambah user baru
    public function create()
    {
        return view('pages.user.create');
    }

    // 💾 Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:4',
        ]);

        $user = new User();
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index')->with('success', 'User baru berhasil ditambahkan!');
    }

    // ✏️ Form edit user lain
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    // 💾 Update user lain
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:4',
        ]);

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    // 🗑️ Hapus user (kecuali user aktif)
    public function destroy($id)
    {
        $currentUser = Session::get('user');

        if ($currentUser && $currentUser->id == $id) {
            return redirect()->route('user.index')->with('error', 'Kamu tidak bisa menghapus akun yang sedang aktif!');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
