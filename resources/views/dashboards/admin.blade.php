@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="mb-4">
    <h1 class="h4">Dashboard Admin</h1>
    <p class="text-muted">Selamat datang, admin. Ini ringkasan data sistem bimbingan belajar.</p>
</div>

<div class="row g-4 mb-4">
    <!-- Kartu statistik -->
    <div class="col-md-3">
        <div class="card text-bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-white">Total Siswa</h6>
                        <h3 class="text-white">{{ \App\Models\Student::count() }}</h3>
                    </div>
                    <i class="bi bi-people-fill fs-1 opacity-25"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-white">Total Guru</h6>
                        <h3 class="text-white">{{ \App\Models\Teacher::count() }}</h3>
                    </div>
                    <i class="bi bi-person-badge-fill fs-1 opacity-25"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-white">Mata Pelajaran</h6>
                        <h3 class="text-white">{{ \App\Models\Course::count() }}</h3>
                    </div>
                    <i class="bi bi-journal-text fs-1 opacity-25"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-white">Jadwal Aktif</h6>
                        <h3 class="text-white">{{ \App\Models\Schedule::count() }}</h3>
                    </div>
                    <i class="bi bi-calendar-week-fill fs-1 opacity-25"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menu navigasi cepat -->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Navigasi Cepat</h5>
        <div class="d-flex flex-wrap gap-3">
            <a href="{{ route('students.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-people-fill me-1"></i> Manajemen Siswa
            </a>
            <a href="{{ route('teachers.index') }}" class="btn btn-outline-success">
                <i class="bi bi-person-badge-fill me-1"></i> Manajemen Guru
            </a>
            <a href="{{ route('courses.index') }}" class="btn btn-outline-warning">
                <i class="bi bi-journal-text me-1"></i> Mata Pelajaran
            </a>
            <a href="{{ route('schedules.index') }}" class="btn btn-outline-danger">
                <i class="bi bi-calendar-week-fill me-1"></i> Jadwal
            </a>
        </div>
    </div>
</div>
@endsection
