@extends('layouts.app')

@section('title', 'Tambah Guru Baru')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-primary text-white d-flex align-items-center py-3 px-4">
        <i class="bi bi-person-plus-fill me-2 fs-4"></i>
        <h5 class="mb-0">Tambah Guru Baru</h5>
    </div>

    <form action="{{ route('teachers.store') }}" method="POST" novalidate>
        @csrf
        <div class="card-body px-4 py-4">
            <div class="row g-4">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="Nama lengkap guru">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="contoh@email.com">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="phone" class="form-label fw-semibold">Nomor Telepon</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone') }}" placeholder="08xxxxxxxxxx">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="birth_date" class="form-label fw-semibold">Tanggal Lahir</label>
                        <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror"
                            value="{{ old('birth_date') }}">
                        @error('birth_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="specialization" class="form-label fw-semibold">Spesialisasi</label>
                        <input type="text" name="specialization" class="form-control @error('specialization') is-invalid @enderror"
                            value="{{ old('specialization') }}" placeholder="Contoh: Matematika">
                        @error('specialization') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="qualification" class="form-label fw-semibold">Kualifikasi</label>
                        <input type="text" name="qualification" class="form-control @error('qualification') is-invalid @enderror"
                            value="{{ old('qualification') }}" placeholder="Contoh: S.Pd, M.Pd">
                        @error('qualification') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="join_date" class="form-label fw-semibold">Tanggal Bergabung</label>
                        <input type="date" name="join_date" class="form-control @error('join_date') is-invalid @enderror"
                            value="{{ old('join_date') }}">
                        @error('join_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="salary" class="form-label fw-semibold">Gaji</label>
                        <input type="number" step="0.01" name="salary" class="form-control @error('salary') is-invalid @enderror"
                            value="{{ old('salary') }}" placeholder="Contoh: 3000000">
                        @error('salary') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="status" class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="address" class="form-label fw-semibold">Alamat</label>
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3"
                            placeholder="Alamat lengkap...">{{ old('address') }}</textarea>
                        @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer bg-white border-top d-flex justify-content-end gap-2 px-4 py-3">
            <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary rounded-pill px-4">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
