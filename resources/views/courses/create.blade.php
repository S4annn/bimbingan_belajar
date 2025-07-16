@extends('layouts.app')

@section('title', 'Tambah Mata Pelajaran Baru')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-primary text-white d-flex align-items-center py-3 px-4">
        <i class="bi bi-journal-plus me-2 fs-4"></i>
        <h5 class="mb-0">Tambah Mata Pelajaran Baru</h5>
    </div>

    <form action="{{ route('courses.store') }}" method="POST" novalidate>
        @csrf
        <div class="card-body px-4 py-4">
            <div class="row g-4">
                <div class="col-md-6">
                    <label for="name" class="form-label fw-semibold">Nama Mata Pelajaran</label>
                    <input type="text" name="name" id="name" placeholder="Contoh: Matematika"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="level" class="form-label fw-semibold">Level</label>
                    <select name="level" id="level" class="form-select @error('level') is-invalid @enderror">
                        <option value="">Pilih Level</option>
                        @foreach(['SD', 'SMP', 'SMA', 'Umum'] as $lvl)
                            <option value="{{ $lvl }}" {{ old('level') == $lvl ? 'selected' : '' }}>{{ $lvl }}</option>
                        @endforeach
                    </select>
                    @error('level') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="price" class="form-label fw-semibold">Harga</label>
                    <input type="number" name="price" id="price" step="0.01" placeholder="Contoh: 150000"
                        class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price') }}">
                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="duration" class="form-label fw-semibold">Durasi (jam)</label>
                    <input type="number" name="duration" id="duration" placeholder="Contoh: 2"
                        class="form-control @error('duration') is-invalid @enderror"
                        value="{{ old('duration') }}">
                    @error('duration') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mt-4">
                <label for="description" class="form-label fw-semibold">Deskripsi</label>
                <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror"
                    placeholder="Deskripsi singkat materi...">{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mt-4">
                <label for="is_active" class="form-label fw-semibold">Status</label>
                <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror">
                    <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Non-Aktif</option>
                </select>
                @error('is_active') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="card-footer bg-white border-top d-flex justify-content-end gap-2 px-4 py-3">
            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary rounded-pill px-4">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
