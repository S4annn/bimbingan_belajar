@extends('layouts.app')

@section('title', 'Edit Data Guru')

@section('content')
<div class="card shadow-sm rounded-3">
    <div class="card-header bg-warning text-white d-flex align-items-center">
        <i class="bi bi-pencil-square me-2 fs-4"></i>
        <h2 class="mb-0 fs-5">Edit Data Guru</h2>
    </div>

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="row g-4">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $teacher->name) }}">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $teacher->email) }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $teacher->phone) }}">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="birth_date" id="birth_date"
                            class="form-control @error('birth_date') is-invalid @enderror"
                            value="{{ old('birth_date', \Carbon\Carbon::parse($teacher->birth_date)->format('Y-m-d')) }}">
                        @error('birth_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="specialization" class="form-label">Spesialisasi</label>
                        <input type="text" name="specialization" id="specialization"
                            class="form-control @error('specialization') is-invalid @enderror"
                            value="{{ old('specialization', $teacher->specialization) }}">
                        @error('specialization') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="qualification" class="form-label">Kualifikasi</label>
                        <input type="text" name="qualification" id="qualification"
                            class="form-control @error('qualification') is-invalid @enderror"
                            value="{{ old('qualification', $teacher->qualification) }}">
                        @error('qualification') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="join_date" class="form-label">Tanggal Bergabung</label>
                        <input type="date" name="join_date" id="join_date"
                            class="form-control @error('join_date') is-invalid @enderror"
                            value="{{ old('join_date', \Carbon\Carbon::parse($teacher->join_date)->format('Y-m-d')) }}">
                        @error('join_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="salary" class="form-label">Gaji</label>
                        <input type="number" name="salary" id="salary" step="0.01"
                            class="form-control @error('salary') is-invalid @enderror"
                            value="{{ old('salary', $teacher->salary) }}">
                        @error('salary') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="active" {{ old('status', $teacher->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $teacher->status) == 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea name="address" id="address" rows="2"
                            class="form-control @error('address') is-invalid @enderror">{{ old('address', $teacher->address) }}</textarea>
                        @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer bg-white border-top d-flex justify-content-end gap-2 py-3">
            <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-warning text-white">
                <i class="bi bi-save me-1"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
