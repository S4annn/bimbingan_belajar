@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="row g-4">

    <!-- Welcome Card -->
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div>
                    <h2 class="h5 text-primary fw-semibold mb-1">
                        <i class="bi bi-house-door-fill me-2"></i> Selamat datang, Admin!
                    </h2>
                    <p class="mb-0 text-muted small">Kelola siswa, guru, jadwal, dan materi pembelajaran dengan mudah.</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <span class="badge bg-success-subtle text-success fw-medium px-3 py-2 rounded-pill">
                        <i class="bi bi-person-badge-fill me-1"></i> Role: Admin
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Access Cards -->
    <div class="col-md-6 col-lg-3">
        <a href="{{ route('students.index') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0 rounded-4 p-3 h-100 hover-shadow">
                <div class="d-flex align-items-center">
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="bi bi-people-fill fs-5"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-dark">Siswa</h6>
                        <small class="text-muted">Data & Profil</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="{{ route('teachers.index') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0 rounded-4 p-3 h-100">
                <div class="d-flex align-items-center">
                    <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="bi bi-person-badge-fill fs-5"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-dark">Guru</h6>
                        <small class="text-muted">Data Pengajar</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="{{ route('courses.index') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0 rounded-4 p-3 h-100">
                <div class="d-flex align-items-center">
                    <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="bi bi-book-fill fs-5"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-dark">Mapel</h6>
                        <small class="text-muted">Materi Pelajaran</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="{{ route('schedules.index') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0 rounded-4 p-3 h-100">
                <div class="d-flex align-items-center">
                    <div class="bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="bi bi-calendar-check-fill fs-5"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-dark">Jadwal</h6>
                        <small class="text-muted">Waktu Belajar</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>
@endsection
