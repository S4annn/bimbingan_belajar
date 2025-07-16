@extends('layouts.app')

@section('title', 'Detail Mata Pelajaran')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center flex-wrap py-3 px-4">
        <h5 class="mb-2 mb-md-0 fw-semibold text-primary">
            <i class="bi bi-book-fill me-2"></i>Detail Mata Pelajaran
        </h5>
        <div class="d-flex gap-2">
            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-outline-warning">
                <i class="bi bi-pencil-fill me-1"></i>Edit
            </a>
            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mata pelajaran ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    <i class="bi bi-trash-fill me-1"></i>Hapus
                </button>
            </form>
        </div>
    </div>

    <div class="card-body px-4 py-4">
        <div class="row g-4">
            <!-- Sidebar Kiri -->
            <div class="col-md-4">
                <div class="bg-light border rounded-3 p-4 text-center">
                    <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center text-white mb-3"
                         style="width: 100px; height: 100px; font-size: 40px; background-color: #6366f1;">
                        {{ strtoupper(substr($course->name, 0, 1)) }}
                    </div>
                    <h4 class="fw-bold text-dark mb-1">{{ $course->name }}</h4>
                    <div class="text-muted mb-3">{{ $course->level }}</div>

                    <div class="text-start small">
                        <div class="mb-2">
                            <i class="bi bi-clock-fill me-2 text-secondary"></i>{{ $course->duration }} jam
                        </div>
                        <div>
                            <i class="bi bi-cash-stack me-2 text-secondary"></i>Rp {{ number_format($course->price, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="col-md-8">
                <div class="border rounded-3 bg-light p-4">
                    <h6 class="fw-semibold text-secondary mb-3">Deskripsi Mata Pelajaran</h6>
                    <p class="text-muted mb-4">{{ $course->description ?? 'Tidak ada deskripsi' }}</p>

                    <h6 class="fw-semibold text-secondary mb-3">Informasi Tambahan</h6>
                    <div class="row small">
                        <div class="col-md-6 mb-3">
                            <strong>Level:</strong><br>{{ $course->level }}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Status:</strong><br>
                            <span class="badge rounded-pill {{ $course->is_active ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                {{ $course->is_active ? 'Aktif' : 'Non-Aktif' }}
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Durasi:</strong><br>{{ $course->duration }} jam
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Harga:</strong><br>Rp {{ number_format($course->price, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
