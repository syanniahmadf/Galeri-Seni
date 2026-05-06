@extends('layouts.admin')

@section('title', 'Tambah Seniman')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8">
            <!-- Navigasi Kembali -->
            <div class="mb-4">
                <a href="{{ route('seniman.index') }}" class="text-decoration-none text-muted small fw-bold text-uppercase" style="letter-spacing: 1px;">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Arsip
                </a>
            </div>

            <!-- Card Form -->
            <div class="card shadow-sm border-0 rounded-0">
                <div class="card-header bg-white py-4 px-4 border-bottom">
                    <h4 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif;">TAMBAH DATA SENIMAN</h4>
                    <p class="text-muted small text-uppercase mb-0" style="letter-spacing: 2px;">Registrasi Data Kontributor Baru</p>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('seniman.store') }}" method="POST">
                        @csrf
                        
                        <!-- Input Nama -->
                        <div class="mb-4">
                            <label for="nama" class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" 
                                   class="form-control rounded-0 border-0 border-bottom bg-light px-0 py-2 @error('nama') is-invalid @enderror" 
                                   style="box-shadow: none; border-radius: 0;"
                                   placeholder="Contoh: Basoeki Abdullah" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text small italic">Masukkan nama lengkap sesuai identitas resmi atau nama panggung.</div>
                        </div>

                        <!-- Input Negara -->
                        <div class="mb-5">
                            <label for="negara" class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Asal Negara</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-0 border-bottom rounded-0 px-0 me-3 text-muted">
                                    <i class="bi bi-globe"></i>
                                </span>
                                <input type="text" name="negara" id="negara" 
                                       class="form-control rounded-0 border-0 border-bottom bg-light py-2 @error('negara') is-invalid @enderror" 
                                       style="box-shadow: none;"
                                       placeholder="Contoh: Belanda" value="{{ old('negara') }}" required>
                            </div>
                            @error('negara')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Aksi Form -->
                        <div class="d-grid gap-3">
                            <button type="submit" class="btn btn-dark py-3 rounded-0 fw-bold text-uppercase" style="letter-spacing: 2px; font-size: 0.8rem;">
                                <i class="bi bi-save me-2"></i>Simpan ke dalam Arsip
                            </button>
                            <button type="reset" class="btn btn-outline-secondary py-2 rounded-0 small text-uppercase" style="letter-spacing: 1px; font-size: 0.7rem;">
                                Bersihkan Input
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Box -->
            <div class="mt-5 p-4 border border-dark rounded-0 bg-white" style="border-left-width: 8px !important;">
                <div class="d-flex align-items-start gap-3">
                    <div class="h4 mb-0 text-dark"><i class="bi bi-info-square"></i></div>
                    <div>
                        <h6 class="fw-bold text-uppercase mb-1" style="font-size: 0.75rem; letter-spacing: 1px;">Pemberitahuan Sistem</h6>
                        <p class="small text-muted mb-0">Profil ini akan digunakan sebagai identitas utama untuk mengelompokkan setiap karya seni yang akan Anda unggah selanjutnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom style untuk input agar hanya garis bawah seperti estetika login */
    .form-control:focus {
        background-color: #f1f1f1 !important;
        border-color: #000 !important;
    }
</style>
@endsection