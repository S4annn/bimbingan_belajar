@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center flex-wrap">
        <h5 class="mb-2 mb-md-0 fw-semibold text-primary">
            <i class="bi bi-person-lines-fill me-2"></i>Detail Siswa
        </h5>
        <div class="d-flex gap-2">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-outline-warning">
                <i class="bi bi-pencil me-1"></i>Edit
            </a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
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
                     style="width: 100px; height: 100px; background-color: #18bc9c; font-size: 36px;">
                    {{ strtoupper(substr($student->name, 0, 1)) }}
                </div>
                <h5 class="mt-3 mb-1 fw-semibold text-dark">{{ $student->name }}</h5>
                <span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill">Kelas {{ $student->grade }}</span>
                <hr>
                <ul class="list-unstyled text-start small text-muted">
                    <li class="mb-2"><i class="bi bi-envelope me-2 text-primary"></i>{{ $student->email }}</li>
                    <li class="mb-2"><i class="bi bi-telephone me-2 text-primary"></i>{{ $student->phone }}</li>
                    <li class="mb-2"><i class="bi bi-geo-alt me-2 text-primary"></i>{{ $student->address }}</li>
                </ul>
            </div>

            <!-- Informasi Detail -->
            <div class="col-md-8">
                <div class="mb-4">
                    <h6 class="fw-semibold text-secondary">Informasi Pribadi</h6>
                    <div class="row small">
                        <div class="col-sm-6 mb-3">
                            <strong>Tanggal Lahir:</strong><br>
                            {{ \Carbon\Carbon::parse($student->birth_date)->format('d F Y') }}
                        </div>
                        <div class="col-sm-6 mb-3">
                            <strong>Usia:</strong><br>
                            {{ \Carbon\Carbon::parse($student->birth_date)->age }} tahun
                        </div>
                        <div class="col-sm-6 mb-3">
                            <strong>Sekolah:</strong><br>
                            {{ $student->school }}
                        </div>
                        <div class="col-sm-6 mb-3">
                            <strong>Kelas:</strong><br>
                            <span class="badge bg-primary-subtle text-primary"> {{ $student->grade }} </span>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-semibold text-secondary">Informasi Orang Tua</h6>
                    <div class="row small">
                        <div class="col-sm-6 mb-3">
                            <strong>Nama Orang Tua:</strong><br>
                            {{ $student->parent_name }}
                        </div>
                        <div class="col-sm-6 mb-3">
                            <strong>Telepon Orang Tua:</strong><br>
                            {{ $student->parent_phone }}
                        </div>
                    </div>
                </div>

                <div>
                    <h6 class="fw-semibold text-secondary">Catatan</h6>
                    <div class="p-3 bg-light border rounded small">
                        {{ $student->notes ?? 'Tidak ada catatan.' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
