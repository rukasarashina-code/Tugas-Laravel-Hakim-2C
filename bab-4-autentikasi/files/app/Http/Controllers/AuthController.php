<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//load Model User
use App\Models\User;
//load HASH untuk cek password
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //fungsi untuk login
    public function cek(Request $request) {
        //mencari data email di table users
        $data = User::where('email', $request->email)->first();

        //jika email ketemu dan password cocok
        if ($data && Hash::check($request->password, $data->password)) {
            //buat ID session baru agar lebih aman
            $request->session()->regenerate();

            //simpan session
            session(['email' => $request->email]);
            session(['logged_in' => true]);

            //masuk ke dashboard
            return redirect('/dashboard');
        }

        //jika salah, kembali ke login
        return redirect('/')->with('error', 'Email atau password salah');
    }

    //fungsi untuk logout
    public function logout(Request $request) {
        //hapus semua session
        $request->session()->flush();

        //kembali ke login
        return redirect('/');
    }
}
