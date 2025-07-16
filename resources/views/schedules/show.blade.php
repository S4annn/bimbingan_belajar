@extends('layouts.app')

@section('title', 'Detail Jadwal')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center flex-wrap py-3 px-4">
        <h5 class="mb-2 mb-md-0 fw-semibold text-primary">
            <i class="bi bi-calendar-event-fill me-2"></i>Detail Jadwal
        </h5>
        <div class="d-flex gap-2">
            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-outline-warning">
                <i class="bi bi-pencil-fill me-1"></i>Edit
            </a>
            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
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
            <!-- Mata Pelajaran -->
            <div class="col-md-4">
                <div class="border rounded-3 p-3 bg-light">
                    <h6 class="fw-semibold text-secondary mb-3">Mata Pelajaran</h6>
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white me-3" style="width: 48px; height: 48px; background-color: #6366f1;">
                            {{ strtoupper(substr($schedule->course->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="fw-semibold text-dark">{{ $schedule->course->name }}</div>
                            <div class="text-muted small">{{ $schedule->course->level }}</div>
                            <div class="text-muted small">Rp {{ number_format($schedule->course->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guru -->
            <div class="col-md-4">
                <div class="border rounded-3 p-3 bg-light">
                    <h6 class="fw-semibold text-secondary mb-3">Guru</h6>
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white me-3" style="width: 48px; height: 48px; background-color: #9c27b0;">
                            {{ strtoupper(substr($schedule->teacher->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="fw-semibold text-dark">{{ $schedule->teacher->name }}</div>
                            <div class="text-muted small">{{ $schedule->teacher->specialization }}</div>
                            <div class="text-muted small">
                                <span class="badge rounded-pill {{ $schedule->teacher->status == 'active' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                    {{ $schedule->teacher->status == 'active' ? 'Aktif' : 'Non-Aktif' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Siswa -->
            <div class="col-md-4">
                <div class="border rounded-3 p-3 bg-light">
                    <h6 class="fw-semibold text-secondary mb-3">Siswa</h6>
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white me-3" style="width: 48px; height: 48px; background-color: #0d6efd;">
                            {{ strtoupper(substr($schedule->student->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="fw-semibold text-dark">{{ $schedule->student->name }}</div>
                            <div class="text-muted small">{{ $schedule->student->grade }}</div>
                            <div class="text-muted small">{{ $schedule->student->school }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Jadwal -->
        <div class="mt-4 border rounded-3 p-4 bg-light">
            <h6 class="fw-semibold text-secondary mb-3">Detail Jadwal</h6>
            <div class="row small">
                <div class="col-md-4 mb-2">
                    <strong>Hari:</strong><br>{{ $schedule->day }}
                </div>
                <div class="col-md-4 mb-2">
                    <strong>Waktu:</strong><br>
                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                </div>
                <div class="col-md-4 mb-2">
                    <strong>Status:</strong><br>
                    @php
                        $statusMap = [
                            'scheduled' => ['label' => 'Dijadwalkan', 'class' => 'bg-info-subtle text-info'],
                            'completed' => ['label' => 'Selesai', 'class' => 'bg-success-subtle text-success'],
                            'cancelled' => ['label' => 'Dibatalkan', 'class' => 'bg-danger-subtle text-danger'],
                        ];
                        $status = $statusMap[$schedule->status];
                    @endphp
                    <span class="badge rounded-pill {{ $status['class'] }}">
                        <i class="bi bi-circle-fill me-1 small"></i>{{ $status['label'] }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Catatan -->
        @if($schedule->notes)
        <div class="mt-4 border rounded-3 p-4 bg-light">
            <h6 class="fw-semibold text-secondary mb-2">Catatan</h6>
            <p class="mb-0 text-muted small">{{ $schedule->notes }}</p>
        </div>
        @endif
    </div>
</div>
@endsection
