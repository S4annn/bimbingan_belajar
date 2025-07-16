@extends('layouts.app')

@section('title', 'Daftar Guru')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center flex-wrap py-3 px-4">
        <div>
            <h5 class="mb-1 fw-semibold text-primary">
                <i class="bi bi-person-badge-fill me-2"></i>Daftar Guru
            </h5>
            @if(request('search'))
                <div class="text-muted small">
                    Menampilkan hasil untuk: <strong class="text-primary">"{{ request('search') }}"</strong>
                    <a href="{{ route('teachers.index') }}" class="ms-2 text-decoration-none">
                        <i class="bi bi-x-circle"></i> Reset
                    </a>
                </div>
            @endif
        </div>

        <div class="d-flex flex-wrap gap-2">
            <form action="{{ route('teachers.search') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control rounded-start" placeholder="Cari guru..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary border-start-0 rounded-end">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <a href="{{ route('teachers.create') }}" class="btn btn-outline-success d-flex align-items-center">
                <i class="bi bi-plus-lg me-1"></i> Tambah
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-uppercase small text-muted">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Spesialisasi</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody class="small">
                @forelse ($teachers as $teacher)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center me-3"
                                 style="width:40px;height:40px;background-color:#f3e5f5;color:#9c27b0;">
                                <span class="fw-semibold text-uppercase">{{ substr($teacher->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <div class="fw-semibold text-dark">{{ $teacher->name }}</div>
                                <div class="text-muted small">{{ $teacher->qualification ?? '-' }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="text-muted">{{ $teacher->email }}</td>
                    <td class="text-muted">{{ $teacher->specialization }}</td>
                    <td>
                        @if($teacher->status == 'active')
                            <span class="badge rounded-pill bg-success-subtle text-success small">
                                <i class="bi bi-check-circle me-1"></i> Aktif
                            </span>
                        @else
                            <span class="badge rounded-pill bg-danger-subtle text-danger small">
                                <i class="bi bi-x-circle me-1"></i> Non-Aktif
                            </span>
                        @endif
                    </td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-sm btn-outline-secondary" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus guru ini?')">
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
                    <td colspan="5" class="text-center text-muted py-4">
                        <i class="bi bi-info-circle me-1"></i>
                        @if(request('search'))
                            Tidak ada hasil ditemukan untuk <strong>"{{ request('search') }}"</strong>.
                        @else
                            Tidak ada data guru.
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($teachers->count())
    <div class="card-footer bg-white d-flex justify-content-between align-items-center px-4 py-3">
        <small class="text-muted d-none d-sm-block">
            Menampilkan {{ $teachers->firstItem() }} sampai {{ $teachers->lastItem() }} dari {{ $teachers->total() }} guru.
        </small>
        <div>
            {{ $teachers->appends(['search' => request('search')])->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
