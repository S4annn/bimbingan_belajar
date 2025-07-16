@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container py-5" style="max-width: 450px;">
    <div class="card shadow-lg rounded-4">
        <div class="card-body p-4">
            <h2 class="mb-4 text-center fw-bold text-primary">Login ke Cerdas.id</h2>

            {{-- Tampilkan pesan error umum --}}
            @if ($errors->has('email'))
                <div class="alert alert-danger small">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="form-control" 
                        value="{{ old('email') }}" 
                        required autofocus
                    >
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label d-flex justify-content-between">
                        <span>Password</span>
                        {{-- Tambahkan fitur lupa password jika ada --}}
                        {{-- <a href="#" class="small text-decoration-none">Lupa password?</a> --}}
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control" 
                        required
                    >
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input 
                        type="checkbox" 
                        name="remember" 
                        class="form-check-input" 
                        id="remember"
                    >
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-primary w-100 shadow-sm">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Masuk
                </button>

                <p class="mt-3 mb-0 text-center">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-decoration-none">Daftar di sini</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
