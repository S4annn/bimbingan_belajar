@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')
<div class="card shadow-sm rounded-3">
    <div class="card-header bg-warning text-white d-flex align-items-center">
        <i class="bi bi-pencil-square me-2 fs-4"></i>
        <h2 class="mb-0 fs-5">Edit Jadwal</h2>
    </div>

    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="row g-4">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Mata Pelajaran</label>
                        <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror">
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id', $schedule->course_id) == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }} ({{ $course->level }})
                                </option>
                            @endforeach
                        </select>
                        @error('course_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="teacher_id" class="form-label">Guru</label>
                        <select name="teacher_id" id="teacher_id" class="form-select @error('teacher_id') is-invalid @enderror">
                            <option value="">Pilih Guru</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id', $schedule->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->name }} ({{ $teacher->specialization }})
                                </option>
                            @endforeach
                        </select>
                        @error('teacher_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="student_id" class="form-label">Siswa</label>
                        <select name="student_id" id="student_id" class="form-select @error('student_id') is-invalid @enderror">
                            <option value="">Pilih Siswa</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ old('student_id', $schedule->student_id) == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }} ({{ $student->grade }})
                                </option>
                            @endforeach
                        </select>
                        @error('student_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="day" class="form-label">Hari</label>
                        <select name="day" id="day" class="form-select @error('day') is-invalid @enderror">
                            <option value="">Pilih Hari</option>
                            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                                <option value="{{ $hari }}" {{ old('day', $schedule->day) == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                            @endforeach
                        </select>
                        @error('day') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="start_time" class="form-label">Waktu Mulai</label>
                        <input type="time" name="start_time" id="start_time"
                            class="form-control @error('start_time') is-invalid @enderror"
                            value="{{ old('start_time', $schedule->start_time) }}">
                        @error('start_time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="end_time" class="form-label">Waktu Selesai</label>
                        <input type="time" name="end_time" id="end_time"
                            class="form-control @error('end_time') is-invalid @enderror"
                            value="{{ old('end_time', $schedule->end_time) }}">
                        @error('end_time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="">Pilih Status</option>
                    <option value="scheduled" {{ old('status', $schedule->status) == 'scheduled' ? 'selected' : '' }}>Dijadwalkan</option>
                    <option value="completed" {{ old('status', $schedule->status) == 'completed' ? 'selected' : '' }}>Selesai</option>
                    <option value="cancelled" {{ old('status', $schedule->status) == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Catatan</label>
                <textarea name="notes" id="notes" rows="3" class="form-control">{{ old('notes', $schedule->notes) }}</textarea>
            </div>
        </div>

        <div class="card-footer bg-white border-top d-flex justify-content-end gap-2 py-3">
            <a href="{{ route('schedules.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-warning text-white">
                <i class="bi bi-save me-1"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
