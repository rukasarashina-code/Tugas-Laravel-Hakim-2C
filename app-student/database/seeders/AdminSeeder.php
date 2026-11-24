<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        //admin utama untuk login: admin / admin123
        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        //4 admin dummy dari factory (total 5 admin)
        Admin::factory()->count(4)->create();
    }
}
