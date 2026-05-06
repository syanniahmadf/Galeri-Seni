<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Galeri Seni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #6c63ff;
            --secondary-bg: #1a1a2e;
            --accent-color: #f6ad55;
        }
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: var(--secondary-bg);
            color: white;
            padding-top: 20px;
            z-index: 1000;
        }
        .sidebar .nav-link {
            color: #a0aec0;
            padding: 12px 25px;
            transition: 0.3s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255,255,255,0.1);
            border-left: 4px solid var(--primary-color);
        }
        .main-content { margin-left: 250px; padding: 20px; }
        .navbar {
            margin-left: 250px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .btn-primary { background-color: var(--primary-color); border: none; }
        .btn-primary:hover { background-color: #5a52d5; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="px-4 mb-4">
            <h4 class="fw-bold text-white">🎨 Galeri Seni</h4>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-house-door me-2"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('seniman.*') ? 'active' : '' }}" href="{{ route('seniman.index') }}">
                <i class="bi bi-person-badge me-2"></i> Seniman
            </a>
            <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                <i class="bi bi-tags me-2"></i> Kategori
            </a>
            <a class="nav-link {{ request()->routeIs('pameran.*') ? 'active' : '' }}" href="{{ route('pameran.index') }}">
                <i class="bi bi-calendar-event me-2"></i> Pameran
            </a>
            <a class="nav-link {{ request()->routeIs('karya-seni.*') ? 'active' : '' }}" href="{{ route('karya-seni.index') }}">
                <i class="bi bi-palette me-2"></i> Karya Seni
            </a>
        </nav>
    </div>

    <nav class="navbar navbar-expand-lg py-3 px-4 sticky-top">
        <div class="container-fluid">
            <span class="navbar-text fw-semibold">Selamat Datang, {{ Auth::user()->name }}</span>
            <div class="ms-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-box-arrow-right me-1"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>