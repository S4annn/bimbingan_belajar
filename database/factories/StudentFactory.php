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
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'birth_date' => $this->faker->dateTimeBetween('-20 years', '-10 years')->format('Y-m-d'),
            'school' => $this->faker->company,
            'grade' => $this->faker->randomElement(['1 SD', '2 SD', '3 SD', '4 SD', '5 SD', '6 SD', '7 SMP', '8 SMP', '9 SMP', '10 SMA', '11 SMA', '12 SMA']),
            'notes' => $this->faker->optional()->paragraph,
            'parent_name' => $this->faker->name,
            'parent_phone' => $this->faker->phoneNumber,
        ];
    }
}