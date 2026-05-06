<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Seni - Admin</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --primary-color: #6c63ff; --sidebar-bg: #1a1a2e; }
        body { background-color: #f8f9fa; }
        .sidebar { width: 250px; height: 100vh; position: fixed; background: var(--sidebar-bg); color: white; }
        .sidebar .nav-link { color: #a0aec0; padding: 12px 20px; transition: 0.3s; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: white; background: #2d3748; border-left: 4px solid var(--primary-color); }
        .main-content { margin-left: 250px; padding: 20px; }
        .topbar { background: #1a1a2e; color: white; padding: 10px 30px; margin-left: 250px; }
        .btn-primary { background-color: var(--primary-color); border: none; }
    </style>
</head>
<body>
    <div class="sidebar d-flex flex-column p-3">
        <h4>🎨 Galeri Seni</h4>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li><a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"><i class="bi bi-house me-2"></i> Dashboard</a></li>
            <li><a href="{{ route('seniman.index') }}" class="nav-link {{ request()->is('admin/seniman*') ? 'active' : '' }}"><i class="bi bi-person-badge me-2"></i> Seniman</a></li>
            <li><a href="{{ route('kategori.index') }}" class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}"><i class="bi bi-tag me-2"></i> Kategori</a></li>
            <li><a href="{{ route('pameran.index') }}" class="nav-link {{ request()->is('admin/pameran*') ? 'active' : '' }}"><i class="bi bi-images me-2"></i> Pameran</a></li>
            <li><a href="{{ route('karya-seni.index') }}" class="nav-link {{ request()->is('admin/karya-seni*') ? 'active' : '' }}"><i class="bi bi-palette me-2"></i> Karya Seni</a></li>
        </ul>
    </div>

    <div class="topbar d-flex justify-content-between align-items-center shadow-sm">
        <span class="fw-bold">Administrator Area</span>
        <div class="dropdown">
            <button class="btn btn-outline-light dropdown-toggle border-0" type="button" data-bs-toggle="dropdown">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm">
                <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>