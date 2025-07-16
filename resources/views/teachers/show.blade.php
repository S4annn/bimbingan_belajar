@extends('layouts.app')

@section('title', 'Detail Guru')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center flex-wrap">
        <h5 class="mb-2 mb-md-0 fw-semibold text-primary">
            <i class="bi bi-person-badge-fill me-2"></i>Detail Guru
        </h5>
        <div class="d-flex gap-2">
            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-outline-warning">
                <i class="bi bi-pencil me-1"></i>Edit
            </a>
            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus guru ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    <i class="bi bi-trash me-1"></i>Hapus
                </button>
            </form>
        </div>
    </div>

    <div class="card-body px-4 py-4">
        <div class="row g-4">
            <!-- Avatar dan Kontak -->
            <div class="col-md-4 text-center">
                <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white shadow"
                     style="width: 100px; height: 100px; background-color: #9c27b0; font-size: 36px;">
                    {{ strtoupper(substr($teacher->name, 0, 1)) }}
                </div>
                <h5 class="mt-3 mb-1 fw-semibold text-dark">{{ $teacher->name }}</h5>
                <span class="badge bg-purple-subtle text-purple px-3 py-1 rounded-pill">
                    {{ $teacher->qualification }}
                </span>
                <hr>
                <ul class="list-unstyled text-start small text-muted">
                    <li class="mb-2"><i class="bi bi-envelope me-2 text-primary"></i>{{ $teacher->email }}</li>
                    <li class="mb-2"><i class="bi bi-telephone me-2 text-primary"></i>{{ $teacher->phone }}</li>
                    <li class="mb-2"><i class="bi bi-geo-alt me-2 text-primary"></i>{{ $teacher->address ?? '-' }}</li>
                </ul>
            </div>

            <!-- Informasi Detail -->
            <div class="col-md-8">
                <div class="mb-4">
                    <h6 class="fw-semibold text-secondary">Informasi Umum</h6>
                    <div class="row small">
                        <div class="col-sm-6 mb-3">
                            <strong>Spesialisasi:</strong><br>
                            {{ $teacher->specialization ?? '-' }}
                        </div>
                        <div class="col-sm-6 mb-3">
                            <strong>Status:</strong><br>
                            @if ($teacher->status == 'active')
                                <span class="badge bg-success-subtle text-success">
                                    <i class="bi bi-check-circle-fill me-1"></i>Aktif
                                </span>
                            @else
                                <span class="badge bg-danger-subtle text-danger">
                                    <i class="bi bi-x-circle-fill me-1"></i>Non-Aktif
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-12">
                            <strong>Bio:</strong><br>
                            <div class="p-3 bg-light border rounded small">
                                {{ $teacher->bio ?? 'Belum ada deskripsi atau bio.' }}
                            </div>
                        </div>
                    </div>
                </div>

                @if($teacher->notes)
                <div>
                    <h6 class="fw-semibold text-secondary">Catatan Tambahan</h6>
                    <div class="p-3 bg-light border rounded small">
                        {{ $teacher->notes }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
