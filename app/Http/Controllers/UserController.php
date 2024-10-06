<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan semua user
    public function index()
    {
        $users = User::all();
        return view('daftaruser.index', compact('users'));
    }

    public function create()
    {
        return view('inputuser.index');
    }

    // Menyimpan user baru
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email|unique:users,email',
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:15',
        'role' => 'required|string',
        'password' => 'required|string|min:8',
    ]);

    try {
        // Membuat user baru
        $user = new User();
        $user->email = $request->email;
        $user->nama = $request->nama;
        $user->telepon = $request->telepon;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    } catch (\Exception $e) {
        // Jika terjadi error, redirect dengan pesan gagal
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan user: ' . $e->getMessage());
    }
}

public function show($email)
{
    $user = User::where('email', $email)->firstOrFail();
    return view('daftaruser.show', compact('user'));
}



public function edit($email)
{
    $user = User::where('email', $email)->firstOrFail();
    return view('daftaruser.edit', compact('user'));
}

public function update(Request $request, $email)
{
    // Mengambil user berdasarkan email
    $user = User::where('email', $email)->firstOrFail();

    // Validasi input
    $request->validate([
        'email' => [
            'required',
            'email',
            // Mengabaikan email yang saat ini dimiliki oleh user
            \Illuminate\Validation\Rule::unique('users', 'email')->ignore($user->email, 'email'),
        ],
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:15',
        'role' => 'required|string',
        // password validation if needed
    ]);

    // Memperbarui informasi user
    $user->nama = $request->nama;
    $user->telepon = $request->telepon;
    $user->role = $request->role;

    // Update password jika ada
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // Simpan perubahan
    $user->save();

    return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
}





    
}
