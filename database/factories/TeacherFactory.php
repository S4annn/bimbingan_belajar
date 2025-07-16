<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'birth_date' => $this->faker->dateTimeBetween('-50 years', '-25 years')->format('Y-m-d'),
            'specialization' => $this->faker->randomElement(['Matematika', 'Fisika', 'Kimia', 'Biologi', 'Bahasa Inggris', 'Bahasa Indonesia']),
            'qualification' => $this->faker->randomElement(['S1', 'S2', 'S3']),
            'join_date' => $this->faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
            'salary' => $this->faker->numberBetween(3000000, 10000000),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}