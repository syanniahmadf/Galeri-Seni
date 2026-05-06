@extends('layouts.admin')

@section('title', 'Edit Pameran')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8">
            <!-- Navigasi Kembali -->
            <div class="mb-4">
                <a href="{{ route('pameran.index') }}" class="text-decoration-none text-muted small fw-bold text-uppercase" style="letter-spacing: 1px;">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Arsip
                </a>
            </div>

            <!-- Card Form Edit -->
            <div class="card shadow-sm border-0 rounded-0">
                <div class="card-header bg-white py-4 px-4 border-bottom">
                    <h4 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif;">EDIT PAMERAN</h4>
                    <p class="text-muted small text-uppercase mb-0" style="letter-spacing: 2px;">Pembaruan Agenda: <span class="text-dark">{{ $pameran->nama }}</span></p>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('pameran.update', $pameran->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Input Nama Pameran -->
                        <div class="mb-4">
                            <label for="nama" class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Nama Pameran *</label>
                            <input type="text" name="nama" id="nama" 
                                   class="form-control rounded-0 border-0 border-bottom bg-light px-0 py-2 @error('nama') is-invalid @enderror" 
                                   style="box-shadow: none; border-radius: 0;"
                                   value="{{ old('nama', $pameran->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Lokasi -->
                        <div class="mb-4">
                            <label for="lokasi" class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Lokasi Pelaksanaan *</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-0 border-bottom rounded-0 px-0 me-3 text-muted">
                                    <i class="bi bi-geo-alt"></i>
                                </span>
                                <input type="text" name="lokasi" id="lokasi" 
                                       class="form-control rounded-0 border-0 border-bottom bg-light py-2 @error('lokasi') is-invalid @enderror" 
                                       style="box-shadow: none;"
                                       value="{{ old('lokasi', $pameran->lokasi) }}" required>
                            </div>
                            @error('lokasi')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Tanggal -->
                        <div class="mb-5">
                            <label for="tanggal" class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Tanggal Pelaksanaan *</label>
                            <input type="date" name="tanggal" id="tanggal" 
                                   class="form-control rounded-0 border-0 border-bottom bg-light px-0 py-2 @error('tanggal') is-invalid @enderror" 
                                   style="box-shadow: none; border-radius: 0;"
                                   value="{{ old('tanggal', $pameran->tanggal) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Aksi Form -->
                        <div class="d-grid gap-3">
                            <button type="submit" class="btn btn-dark py-3 rounded-0 fw-bold text-uppercase" style="letter-spacing: 2px; font-size: 0.8rem;">
                                <i class="bi bi-check2-all me-2"></i>Perbarui Jadwal
                            </button>
                            <a href="{{ route('pameran.index') }}" class="btn btn-outline-secondary py-2 rounded-0 small text-uppercase" style="letter-spacing: 1px; font-size: 0.7rem;">
                                Batalkan Perubahan
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Box Monokrom -->
            <div class="mt-5 p-4 border border-dark rounded-0 bg-white" style="border-left-width: 8px !important;">
                <div class="d-flex align-items-start gap-3">
                    <div class="h4 mb-0 text-dark"><i class="bi bi-exclamation-triangle"></i></div>
                    <div>
                        <h6 class="fw-bold text-uppercase mb-1" style="font-size: 0.75rem; letter-spacing: 1px;">Dampak Perubahan</h6>
                        <p class="small text-muted mb-0">
                            Perubahan jadwal atau lokasi akan memengaruhi metadata pada <strong>{{ $pameran->karya_senis_count ?? '0' }} item</strong> yang saat ini terdaftar dalam agenda pameran ini.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Fokus input monokrom agar selaras dengan modul lainnya */
    .form-control:focus {
        background-color: #f1f1f1 !important;
        border-color: #000 !important;
    }
</style>
@endsection