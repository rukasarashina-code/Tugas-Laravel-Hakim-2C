<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index() {
        $data['judul'] = 'Data Admin';
        $data['admins'] = Admin::all();
        return view('admin.index', $data);
    }

    public function create() {
        $data['judul'] = 'Tambah Admin';
        return view('admin.create', $data);
    }

    public function store(Request $request) {
        $valid = $request->validate([
            'username' => 'required|max:100|unique:admins,username',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'username' => $valid['username'],
            'password' => Hash::make($valid['password']),
        ]);

        return redirect('/admin')->with('sukses', 'Data admin berhasil ditambahkan');
    }

    public function edit(Admin $admin) {
        $data['judul'] = 'Edit Admin';
        $data['admin'] = $admin;
        return view('admin.edit', $data);
    }

    public function update(Request $request, Admin $admin) {
        $valid = $request->validate([
            'username' => ['required', 'max:100', Rule::unique('admins', 'username')->ignore($admin->id_admin, 'id_admin')],
            'password' => 'nullable|min:6',
        ]);

        $admin->username = $valid['username'];
        //password hanya diubah jika diisi
        if (!empty($valid['password'])) {
            $admin->password = Hash::make($valid['password']);
        }
        $admin->save();

        return redirect('/admin')->with('sukses', 'Data admin berhasil diubah');
    }

    public function destroy(Admin $admin) {
        //admin yang sedang login tidak boleh menghapus akunnya sendiri
        if (session('admin_id') == $admin->id_admin) {
            return redirect('/admin')->with('error', 'Akun yang sedang dipakai login tidak bisa dihapus');
        }

        $admin->delete();

        return redirect('/admin')->with('sukses', 'Data admin berhasil dihapus');
    }
}
