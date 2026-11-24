<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'nim'     => $this->faker->unique()->numerify('##########'),
            'nama'    => $this->faker->name,
            'alamat'  => $this->faker->city,
            'gender'  => $this->faker->randomElement(['L', 'P']),
            'jurusan' => $this->faker->randomElement([
                'Teknik Informatika',
                'Sistem Informasi',
                'Teknik Komputer',
                'Manajemen Informatika',
            ]),
        ];
    }
}
