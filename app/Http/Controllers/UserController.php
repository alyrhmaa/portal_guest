<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // 📋 Tampilkan semua user
    public function index(Request $request)
    {
        $currentUser = Session::get('user');

        $users = User::orderBy('created_at', 'asc')
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->filled('role'), function ($query) use ($request) {
                $query->where('role', $request->role);
            })
            ->paginate(5)
            ->withQueryString();

        return view('pages.user.index', compact('users', 'currentUser'));
    }

    // 🧍‍♂️ Profil user yang login
    public function profil()
    {
        $user = User::find(auth()->id());

        if (! $user) {
            return redirect()->route('login')->with('error', 'User tidak ditemukan!');
        }

        return view('pages.user.profil', compact('user'));
    }

    // 🧾 FORM TAMBAH USER BARU
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
            'role'     => 'required|in:admin,user', // ✅ VALIDASI ROLE
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'status'   => $request->status,
            'role'     => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'User baru berhasil ditambahkan!');
    }

    // 💾 Update profil user sendiri
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'            => 'required',
            'email'           => 'required|email|unique:users,email,' . $id,
            'username'        => 'required|unique:users,username,' . $id,
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->username = $request->username;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        // simpan foto
        if ($request->hasFile('profile_picture')) {

            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path                  = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('profil.user')->with('success', 'Profil berhasil diperbarui!');
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
            'role'     => 'required|in:admin,user', // ✅ VALIDASI ROLE
        ]);

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->role = $request->role;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    // 🗑️ Hapus user
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
