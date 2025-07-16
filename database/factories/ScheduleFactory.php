<?php

namespace Database\Factories;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition()
    {
        $startTime = $this->faker->time('H:i');
        $endTime = date('H:i', strtotime($startTime) + rand(1, 3) * 3600);

        return [
            'course_id' => \App\Models\Course::factory(),
            'teacher_id' => \App\Models\Teacher::factory(),
            'student_id' => \App\Models\Student::factory(),
            'day' => $this->faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']),
            'start_time' => $startTime,
            'end_time' => $endTime,
            'status' => $this->faker->randomElement(['scheduled', 'completed', 'cancelled']),
            'notes' => $this->faker->optional()->paragraph,
        ];
    }
}