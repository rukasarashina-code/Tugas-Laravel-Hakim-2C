<?php

namespace App\Http\Controllers;

// load model
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    //aturan validasi form
    private function rules() {
        return [
            'nama'   => 'required|max:30',
            'alamat' => 'required',
            'gender' => 'required|in:L,P',
            'gaji'   => 'required|integer|min:0|max:2000000000',
        ];
    }

    //menampilkan semua data
    public function index() {
        $data['judul'] = 'CRUD data Pegawai';
        $data['employes'] = Employe::all();
        return view('tampil_data', $data);
    }

    //menampilkan form tambah data
    public function create() {
        $data['judul'] = 'Tambah data Pegawai';
        return view('tambah_data', $data);
    }

    //menyimpan data dari form tambah
    public function store(Request $request) {
        $request->validate($this->rules());

        //ambil data di form
        $employe = new Employe;
        $employe->nama = $request->nama;
        $employe->alamat = $request->alamat;
        $employe->gender = $request->gender;
        $employe->gaji = $request->gaji;

        //simpan dalam database
        $employe->save();

        //jika berhasil kembali ke tampil data
        return redirect('/employe')->with('sukses', 'Data pegawai berhasil ditambahkan');
    }

    //menampilkan form edit untuk data yang dipilih
    public function edit(Employe $employe) {
        $data['judul'] = 'Edit data Pegawai';
        $data['employe'] = $employe;
        return view('edit_data', $data);
    }

    //mengubah data di database
    public function update(Request $request, Employe $employe) {
        $request->validate($this->rules());

        //ambil data dari form edit
        $employe->nama = $request->nama;
        $employe->alamat = $request->alamat;
        $employe->gender = $request->gender;
        $employe->gaji = $request->gaji;

        //ubah data dalam database
        $employe->save();

        //kembali ke tabel utama
        return redirect('/employe')->with('sukses', 'Data pegawai berhasil diubah');
    }

    //menghapus data dari database
    public function destroy(Employe $employe) {
        $employe->delete();

        //kembali ke tabel utama
        return redirect('/employe')->with('sukses', 'Data pegawai berhasil dihapus');
    }
}
