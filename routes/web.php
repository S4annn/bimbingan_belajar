<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;

// 🌐 Redirect root ke halaman register
Route::get('/', fn() => redirect()->route('register'));

// 🔐 Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 📚 Protected Routes (Hanya untuk user yang login)
Route::middleware(['auth'])->group(function () {
    // 🧑‍🎓 Students
    Route::get('/students/search', [StudentController::class, 'search'])->name('students.search'); // ✅ Ditaruh sebelum resource
    Route::resource('students', StudentController::class);

    // 👩‍🏫 Teachers
    Route::get('/teachers/search', [TeacherController::class, 'search'])->name('teachers.search'); // ✅ Ditaruh sebelum resource
    Route::resource('teachers', TeacherController::class);

    // 📘 Courses
    Route::get('/courses/search', [CourseController::class, 'search'])->name('courses.search'); // ✅ Ditaruh sebelum resource
    Route::resource('courses', CourseController::class);

    // 📅 Schedules
    Route::get('/schedules/search', [ScheduleController::class, 'search'])->name('schedules.search'); // ✅ Ditaruh sebelum resource
    Route::resource('schedules', ScheduleController::class);
});

// 🎓 Role-Based Dashboards
Route::middleware(['auth', 'check.role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
});

Route::middleware(['auth', 'check.role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [DashboardController::class, 'teacher'])->name('teacher.dashboard');
});

Route::middleware(['auth', 'check.role:student'])->group(function () {
    Route::get('/student/dashboard', [DashboardController::class, 'student'])->name('student.dashboard');
});

// ✨ Shared Dashboard (untuk siswa & guru)
Route::middleware(['auth', 'check.role:student,teacher'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
