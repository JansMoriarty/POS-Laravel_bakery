<?php

namespace App\Http\Controllers;

use App\Models\UserPos;
use Illuminate\Http\Request;

class UserPosController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = UserPos::all();
        return view('user_pos.index', compact('users'));
    }

    // Menampilkan form untuk menambahkan pengguna baru
    public function create()
    {
        return view('user_pos.create');
    }

    // Menyimpan data pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_pos,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,kasir',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan foto jika ada
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
        }

        UserPos::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'address' => $request->address,
            'photo' => $path ?? null,
        ]);

        return redirect()->route('user_pos.index')->with('success', 'User created successfully');
    }

    // Menampilkan detail pengguna
    public function show($id)
    {
        $userPos = UserPos::findOrFail($id); // Cari berdasarkan ID
        return view('user_pos.show', compact('userPos')); // Kirim ke view
    }


    // Menampilkan form untuk mengedit pengguna
    public function edit($id)
    {
        $userPos = UserPos::findOrFail($id); // Cari user berdasarkan ID
        return view('user_pos.edit', compact('userPos')); // Oper ke view
    }


    // Memperbarui data pengguna
    public function update(Request $request, UserPos $userPos)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_pos,email,' . $userPos->id,
            'role' => 'required|in:admin,kasir',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan foto baru jika ada
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            // Hapus foto lama jika ada
            if ($userPos->photo) {
                unlink(storage_path('app/public/' . $userPos->photo));
            }
        }

        $userPos->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'address' => $request->address,
            'photo' => $path ?? $userPos->photo,
        ]);

        return redirect()->route('user_pos.index')->with('success', 'User updated successfully');
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        $userPos = UserPos::findOrFail($id); // Cari berdasarkan ID

        if ($userPos->photo) {
            $photoPath = storage_path('app/public/' . $userPos->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath); // Hapus file jika ada
            }
        }

        $userPos->delete();

        return redirect()->route('user_pos.index')->with('success', 'User deleted successfully');
    }
}
