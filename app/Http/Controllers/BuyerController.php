<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BuyerController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();
        return view('buyer.settings.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'nullable|string|max:20',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'nullable|date',
            'kota' => 'nullable|string|max:100',
            'alamat' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->fill($request->only([
            'name', 'email', 'no_hp', 'jenis_kelamin',
            'tanggal_lahir', 'kota', 'alamat'
        ]));

        if ($request->hasFile('foto_profil')) {
            if ($user->foto_profil) {
                Storage::delete($user->foto_profil);
            }
            $path = $request->file('foto_profil')->store('foto_profil');
            $user->foto_profil = $path;
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
