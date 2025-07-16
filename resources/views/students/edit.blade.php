@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="card shadow-sm rounded-3">
    <div class="card-header bg-warning text-white d-flex align-items-center">
        <i class="bi bi-pencil-square me-2 fs-4"></i>
        <h2 class="mb-0 fs-5">Edit Siswa</h2>
    </div>

    <form action="{{ route('students.update', $student->id) }}" method="POST" novalidate>
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
                            value="{{ old('name', $student->name) }}">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $student->email) }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $student->phone) }}">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="birth_date" id="birth_date"
                            class="form-control @error('birth_date') is-invalid @enderror"
                            value="{{ old('birth_date', $student->birth_date) }}">
                        @error('birth_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="school" class="form-label">Sekolah</label>
                        <input type="text" name="school" id="school"
                            class="form-control @error('school') is-invalid @enderror"
                            value="{{ old('school', $student->school) }}">
                        @error('school') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="grade" class="form-label">Kelas</label>
                        <select name="grade" id="grade" class="form-select @error('grade') is-invalid @enderror">
                            <option value="">Pilih Kelas</option>
                            @foreach (['1 SD','2 SD','3 SD','4 SD','5 SD','6 SD','7 SMP','8 SMP','9 SMP','10 SMA','11 SMA','12 SMA'] as $kelas)
                                <option value="{{ $kelas }}" {{ old('grade', $student->grade) == $kelas ? 'selected' : '' }}>
                                    {{ $kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('grade') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="parent_name" class="form-label">Nama Orang Tua</label>
                        <input type="text" name="parent_name" id="parent_name"
                            class="form-control @error('parent_name') is-invalid @enderror"
                            value="{{ old('parent_name', $student->parent_name) }}">
                        @error('parent_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="parent_phone" class="form-label">Telepon Orang Tua</label>
                        <input type="text" name="parent_phone" id="parent_phone"
                            class="form-control @error('parent_phone') is-invalid @enderror"
                            value="{{ old('parent_phone', $student->parent_phone) }}">
                        @error('parent_phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" id="address" rows="3"
                    class="form-control @error('address') is-invalid @enderror">{{ old('address', $student->address) }}</textarea>
                @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Catatan Tambahan</label>
                <textarea name="notes" id="notes" rows="2" class="form-control">{{ old('notes', $student->notes) }}</textarea>
            </div>
        </div>

        <div class="card-footer bg-white border-top d-flex justify-content-end gap-2 py-3">
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-warning text-white">
                <i class="bi bi-save me-1"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
