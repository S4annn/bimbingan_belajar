@extends('layouts.app')

@section('title', 'Tambah Siswa Baru')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-primary text-white d-flex align-items-center py-3 px-4">
        <i class="bi bi-person-plus me-2 fs-4"></i>
        <h5 class="mb-0">Tambah Siswa Baru</h5>
    </div>

    <form action="{{ route('students.store') }}" method="POST" novalidate>
        @csrf
        <div class="card-body px-4 py-4">
            <div class="row g-4">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" id="name" placeholder="Nama lengkap siswa" autocomplete="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email" placeholder="contoh@email.com" autocomplete="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-semibold">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone" placeholder="08xxxxxxxxxx" autocomplete="tel"
                            class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label fw-semibold">Tanggal Lahir</label>
                        <input type="date" name="birth_date" id="birth_date"
                            class="form-control @error('birth_date') is-invalid @enderror"
                            value="{{ old('birth_date') }}">
                        @error('birth_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="school" class="form-label fw-semibold">Sekolah</label>
                        <input type="text" name="school" id="school" placeholder="Nama sekolah"
                            class="form-control @error('school') is-invalid @enderror" value="{{ old('school') }}">
                        @error('school') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="grade" class="form-label fw-semibold">Kelas</label>
                        <select name="grade" id="grade" class="form-select @error('grade') is-invalid @enderror">
                            <option value="">Pilih Kelas</option>
                            @foreach (['1 SD','2 SD','3 SD','4 SD','5 SD','6 SD','7 SMP','8 SMP','9 SMP','10 SMA','11 SMA','12 SMA'] as $kelas)
                                <option value="{{ $kelas }}" {{ old('grade') == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                            @endforeach
                        </select>
                        @error('grade') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="parent_name" class="form-label fw-semibold">Nama Orang Tua</label>
                        <input type="text" name="parent_name" id="parent_name" placeholder="Nama orang tua"
                            class="form-control @error('parent_name') is-invalid @enderror"
                            value="{{ old('parent_name') }}">
                        @error('parent_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="parent_phone" class="form-label fw-semibold">Telepon Orang Tua</label>
                        <input type="text" name="parent_phone" id="parent_phone" placeholder="08xxxxxxxxxx"
                            class="form-control @error('parent_phone') is-invalid @enderror"
                            value="{{ old('parent_phone') }}">
                        @error('parent_phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <!-- Alamat dan Catatan -->
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label fw-semibold">Alamat</label>
                    <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror"
                        placeholder="Alamat lengkap...">{{ old('address') }}</textarea>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="notes" class="form-label fw-semibold">Catatan Tambahan</label>
                    <textarea name="notes" id="notes" rows="3" class="form-control"
                        placeholder="Opsional...">{{ old('notes') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Footer Tombol -->
        <div class="card-footer bg-white border-top d-flex justify-content-end gap-2 px-4 py-3">
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
