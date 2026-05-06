@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-7">
            <!-- Navigasi Kembali -->
            <div class="mb-4">
                <a href="{{ route('kategori.index') }}" class="text-decoration-none text-muted small fw-bold text-uppercase" style="letter-spacing: 1px;">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Arsip
                </a>
            </div>

            <!-- Card Form -->
            <div class="card shadow-sm border-0 rounded-0">
                <div class="card-header bg-white py-4 px-4 border-bottom text-center">
                    <h4 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif;">TAMBAH KATEGORI</h4>
                    <p class="text-muted small text-uppercase mb-0" style="letter-spacing: 2px;">Klasifikasi Inventaris Baru</p>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-5">
                        <div class="bg-dark text-white d-inline-block p-3 mb-3">
                            <i class="bi bi-tag h3 mb-0"></i>
                        </div>
                    </div>

                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        
                        <!-- Input Nama Kategori -->
                        <div class="mb-5">
                            <label for="nama" class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Nama Kategori</label>
                            <input type="text" name="nama" id="nama" 
                                   class="form-control rounded-0 border-0 border-bottom bg-light px-0 py-2 @error('nama') is-invalid @enderror" 
                                   style="box-shadow: none; border-radius: 0;"
                                   placeholder="Contoh: Lukisan Kontemporer" value="{{ old('nama') }}" required autofocus>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text small italic">Gunakan istilah medium atau aliran seni yang spesifik.</div>
                        </div>

                        <!-- Aksi Form -->
                        <div class="d-grid gap-3">
                            <button type="submit" class="btn btn-dark py-3 rounded-0 fw-bold text-uppercase" style="letter-spacing: 2px; font-size: 0.8rem;">
                                <i class="bi bi-save me-2"></i>Simpan Kategori
                            </button>
                            <button type="reset" class="btn btn-outline-secondary py-2 rounded-0 small text-uppercase" style="letter-spacing: 1px; font-size: 0.7rem;">
                                Bersihkan Input
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Box Artistik -->
            <div class="mt-5 p-4 border border-dark rounded-0 bg-white" style="border-left-width: 8px !important;">
                <div class="d-flex align-items-start gap-3">
                    <div class="h4 mb-0 text-dark"><i class="bi bi-info-square"></i></div>
                    <div>
                        <h6 class="fw-bold text-uppercase mb-1" style="font-size: 0.75rem; letter-spacing: 1px;">Pedoman Klasifikasi</h6>
                        <p class="small text-muted mb-0">Pastikan nama kategori belum terdaftar sebelumnya untuk menjaga integritas data katalog galeri.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Fokus input monokrom */
    .form-control:focus {
        background-color: #f1f1f1 !important;
        border-color: #000 !important;
    }
</style>
@endsection