<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Matematika', 'Fisika', 'Kimia', 'Biologi', 'Bahasa Inggris', 'Bahasa Indonesia']),
            'description' => $this->faker->paragraph,
            'level' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Umum']),
            'price' => $this->faker->numberBetween(100000, 500000),
            'duration' => $this->faker->numberBetween(10, 40),
            'is_active' => $this->faker->boolean(90),
        ];
    }
}