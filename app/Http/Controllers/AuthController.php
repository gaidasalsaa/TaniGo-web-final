<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->role === 'seller') {
                return redirect()->route('seller.dashboard')->with('message', 'Login sebagai Penjual berhasil!');
            } else {
                return redirect()->route('dashboard')->with('message', 'Login sebagai Pembeli berhasil!');
            }
        }

        return back()->with('error', 'Email atau password salah!')->withInput();
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => 'required|string|email|max:255|unique:users',
            'no_hp' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'kota' => 'required|string|max:255',
            'alamat' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            Log::info('Data dari form:', $request->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
            'role' => 'user', 
        ]);

        // dd($request->all());

        Auth::login($user);
        return redirect()->route('login')->with('message', 'Registrasi berhasil! Silakan login.');
 
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('message', 'Berhasil logout!');
    }
}
