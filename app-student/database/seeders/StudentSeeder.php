<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        //10 student dummy dari factory
        Student::factory()->count(10)->create();
    }
}
