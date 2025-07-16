@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm rounded-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i> Daftar Akun</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Konfirmasi Kata Sandi</label>
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required>
                    </div>

                    <!-- Role Admin Otomatis -->
                    <div class="mb-3">
                        <label class="form-label">Daftar Sebagai</label>
                        <input type="text" class="form-control" value="Admin" disabled>
                        <input type="hidden" name="role" value="admin">
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-person-check me-1"></i> Daftar
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-footer bg-light text-center py-3">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
            </div>
        </div>
    </div>
</div>
@endsection
