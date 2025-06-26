<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SellerAuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register_seller');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'kota' => 'required|string|max:255',
            'alamat' => 'required|string',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'foto_profil' => null,
            'role' => 'seller', 
        ]);

        return redirect()->route('login')->with('message', 'Registrasi penjual berhasil! Silakan login.');
    }
}
