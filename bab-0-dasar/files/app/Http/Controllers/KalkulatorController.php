<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    //menampilkan form perkalian (dari modul)
    public function home() {
        $data['judul'] = 'Kalkulator Sederhana';
        $data['angka1'] = 0;
        $data['angka2'] = 0;
        $data['hasil'] = 0;
        return view('kalkulator', $data);
    }

    //proses perkalian (dari modul)
    public function proses(Request $request) {
        $data['judul'] = 'Kalkulator Sederhana';
        $data['angka1'] = $request->input('angka1');
        $data['angka2'] = $request->input('angka2');
        $data['hasil'] = $data['angka1'] * $data['angka2'];
        return view('kalkulator', $data);
    }

    //menampilkan form luas segitiga (latihan no. 3)
    public function segitiga() {
        $data['judul'] = 'Kalkulator Luas Segitiga';
        $data['alas'] = 0;
        $data['tinggi'] = 0;
        $data['hasil'] = 0;
        return view('segitiga', $data);
    }

    //proses hitung luas segitiga: 1/2 x alas x tinggi
    public function segitigaProses(Request $request) {
        $data['judul'] = 'Kalkulator Luas Segitiga';
        $data['alas'] = $request->input('alas');
        $data['tinggi'] = $request->input('tinggi');
        $data['hasil'] = 0.5 * (float) $data['alas'] * (float) $data['tinggi'];
        return view('segitiga', $data);
    }
}
