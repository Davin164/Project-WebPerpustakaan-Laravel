<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function view(){
        return view('register');
    }

    public function aksi(Request $request)
    {
        // Validasi lebih lengkap
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5',
            'NIS' => 'nullable|string',
            'NIY' => 'nullable|string',
        ]);

        // Cek apakah email sudah terdaftar (sudah dicek di validasi, tapi tetap bisa pakai ini)
        $existUser = User::where('email', $request->email)->exists();

        if ($existUser) {
            return redirect()->route('register')->with('pesan', 'Email sudah terdaftar');
        }

        // Buat user baru dengan role default 'user'
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user', // HARD CODE role user, jangan ambil dari request!
            'NIS' => $request->NIS,
            'NIY' => $request->NIY,
        ]);

        return redirect()->route('login')->with('pesan', 'Berhasil mendaftar, silakan login');
    }
}
