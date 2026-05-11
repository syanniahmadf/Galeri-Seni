<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Galeri Seni Eksklusif</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

    <style>
       :root {
    /* Gradasi Monokrom: Putih ke Abu-abu cerah */
    --bg-gradient: linear-gradient(135deg, #ffffff 0%, #f0f0f0 50%, #dcdcdc 100%);
    --accent-color: #000000;
    --text-muted: #666666;
    --gold-sparkle: #d4af37;
    }

    body {
    font-family: 'Inter', sans-serif;
    height: 100vh;
    margin: 0;
    overflow: hidden;
    /* Menggunakan gradasi yang sudah didefinisikan */
    background: var(--bg-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    }

        /* --- ANIMASI KEYFRAMES --- */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-30px); }
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(-5deg); }
            50% { transform: rotate(5deg); }
        }

        @keyframes sway {
            0%, 100% { transform: translateX(-20px) rotate(-2deg); }
            50% { transform: translateX(20px) rotate(2deg); }
        }

        @keyframes slowSpin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes sparkle {
            0%, 100% { opacity: 0.2; transform: scale(0.8); }
            50% { opacity: 0.8; transform: scale(1.4); }
        }

        /* --- BACKGROUND ELEMENTS --- */
        .art-gallery-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        .art-item {
            position: absolute;
            opacity: 1; /* Tidak transparan */
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .art-item img {
            width: 160px; /* Ukuran lebih besar agar memenuhi layar */
            height: auto;
            border-radius: 8px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            border: 4px solid #fff; /* Efek bingkai galeri */
        }

        .art-label { 
            font-size: 0.65rem; 
            text-transform: uppercase; 
            letter-spacing: 2px; 
            margin-top: 10px; 
            color: #000;
            font-weight: 700;
            background: rgba(255,255,255,0.8);
            padding: 2px 8px;
            border-radius: 4px;
        }

        /* Responsive Background: Sembunyikan elemen dekoratif di layar kecil agar tidak berantakan */
        @media (max-width: 768px) {
            .art-item, .sparkle-dot { display: none; }
        }

        /* Posisi yang menyebar memenuhi background */
        /* 2 Lukisan */
        .lukisan-1 { top: 8%; left: 8%; animation: float 6s infinite ease-in-out; }
        .lukisan-2 { bottom: 12%; right: 10%; animation: sway 9s infinite ease-in-out; }
        
        /* 2 Patung */
        .patung-1 { top: 10%; right: 8%; animation: float 8s infinite ease-in-out; }
        .patung-1 img { width: 140px; }
        .patung-2 { bottom: 10%; left: 12%; animation: wiggle 10s infinite ease-in-out; }
        .patung-2 img { width: 140px; }
        
    
        /* Sparkles */
        .sparkle-dot {
            position: absolute;
            width: 6px;
            height: 6px;
            background: var(--gold-sparkle);
            border-radius: 50%;
            animation: sparkle 3s infinite;
        }

        /* --- LOGIN CARD --- */
        .login-card {
            position: relative;
            z-index: 100;
            width: 100%;
            max-width: 480px;
            border: 1px solid #eee;
            border-radius: 0;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(15px);
            padding: 40px 30px;
            box-shadow: 0 40px 100px rgba(0,0,0,0.1);
        }

        .art-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2.8rem;
            letter-spacing: -1.5px;
            color: #000;
            text-transform: uppercase;
        }

        .form-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            color: #666;
        }

        .form-control {
            border: none;
            border-bottom: 2px solid #f0f0f0;
            border-radius: 0;
            padding: 12px 0;
            font-size: 0.95rem;
            background: transparent;
            transition: all 0.4s;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #000;
        }

        .btn-art {
            background: #000;
            color: #fff;
            border: none;
            border-radius: 0;
            padding: 16px;
            font-weight: 600;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-size: 0.75rem;
            margin-top: 30px;
            transition: all 0.4s;
        }

        .btn-art:hover {
            background: #333;
            letter-spacing: 6px;
        }

        .footer-credit {
            margin-top: 40px;
            font-size: 0.6rem;
            letter-spacing: 3px;
            color: #aaa;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

    <!-- Gallery Background Elements -->
    <div class="art-gallery-bg">
        <!-- 2 Lukisan -->
        <div class="art-item lukisan-1">
            <img src="https://cdn.pixabay.com/photo/2013/01/05/21/02/art-74050_1280.jpg" alt="Lanskap Impresionis">
            <span class="art-label">Mona Lisa</span>
        </div>
        <div class="art-item lukisan-2">
            <img src="https://tse3.mm.bing.net/th/id/OIP.B7nhRmULLBAsQUKiLURvlgHaGS?w=2429&h=2064&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Seni Abstrak">
            <span class="art-label">The Starry Night</span>
        </div>

        <!-- 2 Patung -->
        <div class="art-item patung-1">
            <img src="https://tse3.mm.bing.net/th/id/OIP.IaPk3CfTjPSRmQlKFj_2MgHaJ3?w=563&h=750&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Bust Yunani">
            <span class="art-label">Winged Victory of Samothrace</span>
        </div>
        <div class="art-item patung-2">
            <img src="https://tse1.mm.bing.net/th/id/OIP.OHb33o3FkatG__9egVmxNgHaHb?pid=ImgDet&w=202&h=202&c=7&dpr=1,5&o=7&rm=3" alt="Patung Modern">
            <span class="art-label">David</span>
        </div>

        <!-- Sparkles -->
        <div class="sparkle-dot" style="top: 20%; left: 30%;"></div>
        <div class="sparkle-dot" style="top: 50%; left: 80%;"></div>
        <div class="sparkle-dot" style="top: 80%; left: 20%;"></div>
        <div class="sparkle-dot" style="top: 15%; right: 40%;"></div>
        <div class="sparkle-dot" style="bottom: 30%; right: 15%;"></div>
    </div>

    <!-- Login Card -->
    <div class="login-card">
        <div class="text-center mb-5">
            <h1 class="art-title">Gallery Art</h1>
            <p class="small text-muted" style="letter-spacing: 6px; text-transform: uppercase; font-size: 0.6rem;">Admin System Login</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="form-label">email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autofocus placeholder="ADMIN@GALLERY.COM">
                @error('email')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-5">
                <label class="form-label">password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                       name="password" required placeholder="••••••••">
                @error('password')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-art">
                    login <i class="bi bi-chevron-right ms-2"></i>
                </button>
            </div>
        </form>

        <div class="footer-credit text-center">
            &copy; {{ date('Y') }} GALERI SENI MANAGEMENT SYSTEM <br> BY KELOMPOK 5
        </div>
    </div>

</body>
</html>
