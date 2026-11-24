<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    //menampilkan semua data
    public function index() {
        $data['judul'] = 'Data Admin';
        $data['admins'] = Admin::all();
        return view('admin.index', $data);
    }

    //menampilkan form tambah data
    public function create() {
        $data['judul'] = 'Tambah Admin';
        return view('admin.create', $data);
    }

    //menyimpan data dari form tambah
    public function store(Request $request) {
        $valid = $request->validate([
            'username' => 'required|max:100|unique:admins,username',
            'password' => 'required|min:6|max:100',
        ]);

        $admin = new Admin;
        $admin->username = $valid['username'];
        //password disimpan dalam bentuk hash
        $admin->password = Hash::make($valid['password']);
        $admin->save();

        return redirect('/admin')->with('sukses', 'Data admin berhasil ditambahkan');
    }

    //menampilkan form edit
    public function edit(Admin $admin) {
        $data['judul'] = 'Edit Admin';
        $data['admin'] = $admin;
        return view('admin.edit', $data);
    }

    //mengubah data di database
    public function update(Request $request, Admin $admin) {
        $valid = $request->validate([
            'username' => ['required', 'max:100', Rule::unique('admins', 'username')->ignore($admin->id_admin, 'id_admin')],
            'password' => 'nullable|min:6|max:100',
        ]);

        $admin->username = $valid['username'];
        //password hanya diubah jika diisi
        if (!empty($valid['password'])) {
            $admin->password = Hash::make($valid['password']);
        }
        $admin->save();

        return redirect('/admin')->with('sukses', 'Data admin berhasil diubah');
    }

    //menghapus data dari database
    public function destroy(Admin $admin) {
        $admin->delete();

        return redirect('/admin')->with('sukses', 'Data admin berhasil dihapus');
    }
}
