<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //proses login berdasarkan tabel admins
    public function cek(Request $request) {
        //cari admin berdasarkan username
        $admin = Admin::where('username', $request->username)->first();

        //jika ketemu dan password cocok
        if ($admin && Hash::check($request->password, $admin->password)) {
            //buat ID session baru agar lebih aman
            $request->session()->regenerate();

            //simpan session
            session([
                'admin_id'       => $admin->id_admin,
                'admin_username' => $admin->username,
                'logged_in'      => true,
            ]);

            return redirect('/student');
        }

        //jika salah, kembali ke login
        return redirect('/')->with('error', 'Username atau password salah');
    }

    //logout: hapus semua session
    public function logout(Request $request) {
        $request->session()->flush();

        return redirect('/');
    }
}
