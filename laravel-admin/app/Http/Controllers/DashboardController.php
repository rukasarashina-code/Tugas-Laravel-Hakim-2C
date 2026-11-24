<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home() {
        $data['judul'] = 'Home';
        return view('home', $data);
    }

    public function product() {
        $data['judul'] = 'Product';
        $data['products'] = [
            ['nama' => 'Sepatu', 'kategori' => 'Fashion', 'harga' => 300000],
            ['nama' => 'Baju',   'kategori' => 'Fashion', 'harga' => 200000],
            ['nama' => 'Celana', 'kategori' => 'Fashion', 'harga' => 150000],
        ];
        return view('product', $data);
    }

    public function service() {
        $data['judul'] = 'Service';
        $data['services'] = [
            ['nama' => 'Pengiriman Cepat',  'icon' => 'fa-shipping-fast', 'isi' => 'Pesanan dikirim di hari yang sama untuk wilayah tertentu.'],
            ['nama' => 'Garansi Produk',    'icon' => 'fa-shield-alt',    'isi' => 'Garansi tukar barang 7 hari jika produk tidak sesuai.'],
            ['nama' => 'Layanan Pelanggan', 'icon' => 'fa-headset',       'isi' => 'Tim kami siap membantu setiap hari kerja pukul 08.00 - 17.00.'],
        ];
        return view('service', $data);
    }

    public function contact() {
        $data['judul'] = 'Contact';
        return view('contact', $data);
    }

    public function about() {
        $data['judul'] = 'About';
        return view('about', $data);
    }
}
