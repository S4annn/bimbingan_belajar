@extends('layouts.app')

@section('title', 'Daftar Mata Pelajaran')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center flex-wrap py-3 px-4">
        <h5 class="mb-2 mb-md-0 fw-semibold text-primary">
            <i class="bi bi-journal-bookmark-fill me-2"></i>Daftar Mata Pelajaran
        </h5>
        <div class="d-flex flex-wrap gap-2">
            <form action="{{ route('courses.search') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control rounded-start" placeholder="Cari mata pelajaran..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary border-start-0 rounded-end">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <a href="{{ route('courses.create') }}" class="btn btn-outline-success d-flex align-items-center">
                <i class="bi bi-plus-lg me-1"></i> Tambah
            </a>
        </div>
    </div>

    @if(request('search'))
        <div class="px-4 pt-3 text-muted">
            Menampilkan hasil untuk: <strong class="text-primary">"{{ request('search') }}"</strong>
            <a href="{{ route('courses.index') }}" class="ms-2 text-decoration-none">
                <i class="bi bi-x-circle"></i> Reset
            </a>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-uppercase small text-muted">
                <tr>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Durasi</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody class="small">
                @forelse ($courses as $course)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;background-color:#e0e7ff;color:#6366f1;">
                                <span class="fw-semibold text-uppercase">{{ substr($course->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <div class="fw-semibold text-dark">{{ $course->name }}</div>
                                <div class="text-muted small">{{ Str::limit($course->description, 40) }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="text-muted">{{ $course->level }}</td>
                    <td class="text-muted">{{ $course->duration }} jam</td>
                    <td class="text-muted">Rp {{ number_format($course->price, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge rounded-pill {{ $course->is_active ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                            <i class="bi bi-circle-fill me-1 small"></i>
                            {{ $course->is_active ? 'Aktif' : 'Non-Aktif' }}
                        </span>
                    </td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-outline-secondary" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mata pelajaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                        <i class="bi bi-info-circle me-1"></i> Belum ada data mata pelajaran.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($courses->count())
    <div class="card-footer bg-white d-flex justify-content-between align-items-center px-4 py-3">
        <small class="text-muted d-none d-sm-block">
            Menampilkan {{ $courses->firstItem() }} sampai {{ $courses->lastItem() }} dari {{ $courses->total() }} mata pelajaran.
        </small>
        <div>
            {{ $courses->appends(['search' => request('search')])->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
