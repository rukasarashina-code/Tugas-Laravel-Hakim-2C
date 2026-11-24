<?php

namespace Database\Seeders;

use App\Models\Admin;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin tetap: admin / admin123
        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        //5 admin acak dengan Faker, password: password
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 5; $i++) {
            Admin::create([
                'username' => $faker->unique()->userName,
                'password' => Hash::make('password'),
            ]);
        }
    }
}
