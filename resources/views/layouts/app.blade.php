<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerdas.id – @yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
        }

        .main-layout {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .sidebar {
            min-width: 220px;
            background-color: #ffffff;
            border-right: 1px solid #e5e5e5;
        }

        .sidebar .nav-link {
            color: #333;
            font-weight: 500;
        }

        .sidebar .nav-link.active {
            background-color: #e9f5ff;
            color: #0d6efd;
            border-left: 4px solid #0d6efd;
        }

        .content-area {
            flex-grow: 1;
            padding: 1.5rem;
        }

        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: #ffffff;
            border-top: 1px solid #eaeaea;
        }
    </style>

    @yield('head')
</head>
<body>
<div class="main-layout">

    <!-- Navbar -->
    <header class="navbar navbar-expand-lg bg-white shadow-sm sticky-top px-3">
        <div class="container-fluid">
            <!-- Sidebar Toggle for Mobile -->
            <button class="btn d-md-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                <i class="bi bi-list fs-5"></i>
            </button>

            <a class="navbar-brand text-primary fw-bold" href="{{ route('students.index') }}">
                <i class="bi bi-mortarboard-fill me-1"></i> Cerdas<span class="text-warning">.id</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
                <ul class="navbar-nav gap-lg-3">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill me-1"></i> Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary px-3 py-1" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary px-3 py-1 ms-2" href="{{ route('register') }}">
                            <i class="bi bi-person-plus-fill me-1"></i> Daftar
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </header>

    <!-- Layout -->
    <div class="d-flex flex-grow-1">

        <!-- Sidebar (Desktop only) -->
        <aside class="sidebar d-none d-md-block p-3">
            <h6 class="text-uppercase text-muted fw-semibold small mb-3 ps-1">
                <i class="bi bi-speedometer2 me-1"></i> Dashboard
            </h6>
            <nav class="nav flex-column">
                <a class="nav-link {{ request()->is('students*') ? 'active' : '' }}" href="{{ route('students.index') }}">
                    <i class="bi bi-people-fill me-2"></i> Siswa
                </a>
                <a class="nav-link {{ request()->is('teachers*') ? 'active' : '' }}" href="{{ route('teachers.index') }}">
                    <i class="bi bi-person-badge-fill me-2"></i> Guru
                </a>
                <a class="nav-link {{ request()->is('courses*') ? 'active' : '' }}" href="{{ route('courses.index') }}">
                    <i class="bi bi-book-fill me-2"></i> Mapel
                </a>
                <a class="nav-link {{ request()->is('schedules*') ? 'active' : '' }}" href="{{ route('schedules.index') }}">
                    <i class="bi bi-calendar-check-fill me-2"></i> Jadwal
                </a>
            </nav>
        </aside>

        <!-- Sidebar Offcanvas (Mobile only) -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-primary">
                    <i class="bi bi-mortarboard-fill me-1"></i> Cerdas<span class="text-warning">.id</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->is('students*') ? 'active' : '' }}" href="{{ route('students.index') }}">
                        <i class="bi bi-people-fill me-2"></i> Siswa
                    </a>
                    <a class="nav-link {{ request()->is('teachers*') ? 'active' : '' }}" href="{{ route('teachers.index') }}">
                        <i class="bi bi-person-badge-fill me-2"></i> Guru
                    </a>
                    <a class="nav-link {{ request()->is('courses*') ? 'active' : '' }}" href="{{ route('courses.index') }}">
                        <i class="bi bi-book-fill me-2"></i> Mapel
                    </a>
                    <a class="nav-link {{ request()->is('schedules*') ? 'active' : '' }}" href="{{ route('schedules.index') }}">
                        <i class="bi bi-calendar-check-fill me-2"></i> Jadwal
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <main class="content-area w-100">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="footer text-center text-muted">
        &copy; {{ now()->year }} <strong>Cerdas.id</strong> — All rights reserved.
    </footer>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
