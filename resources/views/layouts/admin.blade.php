<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Galeri Seni</title>
    <!-- CSS Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts: Playfair untuk judul, Inter untuk teks -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-dark: #111111;
            --sidebar-active: #222222;
            --content-bg: #fafafa;
            --primary-black: #000000;
            --border-color: #e5e5e5;
            --glass-white: rgba(255, 255, 255, 0.7);
        }

        body {
            background-color: var(--content-bg);
            /* Tekstur titik halus untuk latar belakang agar tidak polos */
            background-image: radial-gradient(#d1d1d1 0.5px, transparent 0.5px);
            background-size: 20px 20px;
            font-family: 'Inter', sans-serif;
            color: var(--primary-black);
            overflow-x: hidden;
        }

        /* --- SIDEBAR DARK MATTE --- */
        .sidebar {
            width: 270px;
            height: 100vh;
            position: fixed;
            background-color: var(--sidebar-dark);
            color: #ffffff;
            padding-top: 40px;
            z-index: 1050;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 10px 0 30px rgba(0,0,0,0.05);
        }

        .brand-section {
            padding: 0 30px 50px;
        }

        .brand-section h4 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            letter-spacing: -1px;
            text-transform: uppercase;
            font-size: 1.8rem;
            margin-bottom: 0;
            color: #fff;
        }

        .brand-section p {
            font-size: 0.65rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #666;
            margin-top: 5px;
        }

        .nav-link {
            color: #888888;
            padding: 16px 30px;
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.3s;
            border-right: 4px solid transparent;
            display: flex;
            align-items: center;
        }

        .nav-link i {
            font-size: 1.2rem;
            margin-right: 15px;
            transition: transform 0.3s;
        }

        .nav-link:hover {
            color: #ffffff;
            background-color: var(--sidebar-active);
            padding-left: 35px;
        }

        .nav-link:hover i {
            transform: scale(1.2);
        }

        .nav-link.active {
            color: #ffffff;
            background-color: var(--sidebar-active);
            border-right: 4px solid #ffffff;
        }

        /* --- NAVBAR GLASS --- */
        .navbar-custom {
            margin-left: 270px;
            height: 80px;
            background-color: var(--glass-white);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .admin-badge {
            background-color: #000;
            color: #fff;
            padding: 5px 15px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* --- MAIN CONTENT --- */
        .main-content {
            margin-left: 270px;
            padding: 50px 40px;
            min-height: calc(100vh - 80px);
        }

        /* --- UI COMPONENTS ENHANCEMENT --- */
        .card {
            border: 1px solid var(--border-color);
            border-radius: 0;
            box-shadow: 20px 20px 60px rgba(0,0,0,0.03);
            background-color: #fff;
            transition: all 0.4s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 20px 30px 70px rgba(0,0,0,0.07);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid var(--border-color);
            padding: 20px 25px;
        }

        .btn-primary {
            background-color: var(--primary-black);
            color: #fff;
            border: 1px solid var(--primary-black);
            border-radius: 0;
            padding: 12px 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.75rem;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: transparent;
            color: var(--primary-black);
        }

        .btn-outline-dark {
            border-radius: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .alert-success {
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 0;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        /* Mobile Adjustments */
        @media (max-width: 992px) {
            .sidebar {
                margin-left: -270px;
            }
            .sidebar.active {
                margin-left: 0;
            }
            .main-content, .navbar-custom {
                margin-left: 0;
            }
        }

        /* Dekorasi Artistik */
        .art-decor {
            position: fixed;
            bottom: -50px;
            right: 50px;
            font-family: 'Playfair Display', serif;
            font-size: 15rem;
            color: rgba(0,0,0,0.12);
            z-index: -1;
            pointer-events: none;
            font-style: italic;
        }
    </style>
</head>
<body>

    <!-- Art Background Decoration -->
    <div class="art-decor">Gallery</div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="brand-section text-center text-lg-start">
            <h4>Gallery</h4>
            <p>Fine Art Management</p>
        </div>
        
        <nav class="nav flex-column mt-2">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-columns-gap"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('seniman.*') ? 'active' : '' }}" href="{{ route('seniman.index') }}">
                <i class="bi bi-person-fill"></i> Seniman
            </a>
            <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                <i class="bi bi-collection"></i> Kategori
            </a>
            <a class="nav-link {{ request()->routeIs('pameran.*') ? 'active' : '' }}" href="{{ route('pameran.index') }}">
                <i class="bi bi-easel2"></i> Pameran
            </a>
            <a class="nav-link {{ request()->routeIs('karya-seni.*') ? 'active' : '' }}" href="{{ route('karya-seni.index') }}">
                <i class="bi bi-palette"></i> Karya Seni
            </a>
        </nav>

        <div class="position-absolute bottom-0 start-0 w-100 p-4 text-center">
            <p class="text-white-50 small mb-0" style="font-size: 0.6rem; letter-spacing: 2px;">EST. 2026 KELOMPOK 5</p>
        </div>
    </div>

    <!-- Header / Navbar -->
    <header class="navbar-custom">
        <div class="d-flex align-items-center w-100">
            <button class="btn d-lg-none me-3" onclick="toggleSidebar()">
                <i class="bi bi-list fs-3"></i>
            </button>
            
            <div class="d-flex align-items-center">
                <div class="admin-badge me-3">ADMIN</div>
                <span class="fw-medium small text-muted">
                    Session: <span class="text-dark fw-bold">{{ Auth::user()->name }}</span>
                </span>
            </div>

            <div class="ms-auto d-flex align-items-center gap-3">
                <div class="text-end d-none d-md-block">
                    <p class="small text-muted mb-0" style="font-size: 0.7rem;">Current Date</p>
                    <p class="small fw-bold mb-0">{{ date('d M Y') }}</p>
                </div>
                <div class="vr mx-2 text-muted opacity-25"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark px-4 py-2">
                        Logout <i class="bi bi-box-arrow-right ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Content Area -->
    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-5 p-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-all fs-4 me-3"></i>
                    <span class="text-uppercase small fw-bold" style="letter-spacing: 1px;">{{ session('success') }}</span>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        <div class="container-fluid p-0">
            @yield('content')
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>