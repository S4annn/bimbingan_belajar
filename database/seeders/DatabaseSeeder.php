<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 teachers
        $teachers = Teacher::factory(10)->create();

        // Create 5 courses
        $courses = Course::factory(5)->create();

        // Create 20 students
        $students = Student::factory(20)->create();

        // Attach courses to teachers
        $teachers->each(function ($teacher) use ($courses) {
            $teacher->courses()->attach(
                $courses->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Attach courses to students
        $students->each(function ($student) use ($courses) {
            $student->courses()->attach(
                $courses->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}