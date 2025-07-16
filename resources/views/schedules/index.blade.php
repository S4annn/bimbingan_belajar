@extends('layouts.app')

@section('title', 'Daftar Jadwal')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center flex-wrap py-3 px-4">
        <h5 class="mb-2 mb-md-0 fw-semibold text-primary">
            <i class="bi bi-calendar-event me-2"></i>Daftar Jadwal
        </h5>
        <div class="d-flex flex-wrap gap-2">
            <form action="{{ route('schedules.search') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control rounded-start" placeholder="Cari jadwal..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary border-start-0 rounded-end">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <a href="{{ route('schedules.create') }}" class="btn btn-outline-success d-flex align-items-center">
                <i class="bi bi-plus-lg me-1"></i> Tambah
            </a>
        </div>
    </div>

    @if(request('search'))
        <div class="px-4 pt-3 text-muted">
            Menampilkan hasil untuk: <strong class="text-primary">"{{ request('search') }}"</strong>
            <a href="{{ route('schedules.index') }}" class="ms-2 text-decoration-none">
                <i class="bi bi-x-circle"></i> Reset
            </a>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-uppercase small text-muted">
                <tr>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                    <th>Siswa</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody class="small">
                @forelse ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->course->name ?? '-' }}</td>
                    <td>{{ $schedule->teacher->name ?? '-' }}</td>
                    <td>{{ $schedule->student->name ?? '-' }}</td>
                    <td>{{ $schedule->day }}</td>
                    <td>{{ $schedule->time }}</td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('schedules.show', $schedule->id) }}" class="btn btn-sm btn-outline-secondary" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                        <i class="bi bi-info-circle me-1"></i> Tidak ada data jadwal.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($schedules->count())
    <div class="card-footer bg-white d-flex justify-content-between align-items-center px-4 py-3">
        <small class="text-muted d-none d-sm-block">
            Menampilkan {{ $schedules->firstItem() }} sampai {{ $schedules->lastItem() }} dari {{ $schedules->total() }} data jadwal.
        </small>
        <div>
            {{ $schedules->appends(['search' => request('search')])->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
    