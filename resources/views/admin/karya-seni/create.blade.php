@extends('layouts.admin')

@section('title', 'Tambah Karya Seni')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <!-- Navigasi Kembali -->
            <div class="mb-4">
                <a href="{{ route('karya-seni.index') }}" class="text-decoration-none text-muted small fw-bold text-uppercase" style="letter-spacing: 1px;">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Katalog
                </a>
            </div>

            <!-- Card Form -->
            <div class="card shadow-sm border-0 rounded-0">
                <div class="card-header bg-white py-4 px-4 border-bottom">
                    <h4 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif;">TAMBAH KARYA SENI</h4>
                    <p class="text-muted small text-uppercase mb-0" style="letter-spacing: 2px;">Registrasi Karya Seni ke Dalam Inventaris</p>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('karya-seni.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Judul Karya -->
                            <div class="col-md-12 mb-4">
                                <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Judul Karya *</label>
                                <input type="text" name="judul" 
                                       class="form-control rounded-0 border-0 border-bottom bg-light px-0 py-2 @error('judul') is-invalid @enderror" 
                                       style="box-shadow: none;"
                                       placeholder="Masukkan judul mahakarya" value="{{ old('judul') }}" required>
                                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Dropdown Row -->
                            <div class="col-md-4 mb-4">
                                <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Seniman *</label>
                                <select name="seniman_id" class="form-select rounded-0 border-0 border-bottom bg-light px-0 py-2" style="box-shadow: none;" required>
                                    <option value="" disabled selected>Pilih Seniman</option>
                                    @foreach($senimans as $s)
                                        <option value="{{ $s->id }}" {{ old('seniman_id') == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Kategori *</label>
                                <select name="kategori_id" class="form-select rounded-0 border-0 border-bottom bg-light px-0 py-2" style="box-shadow: none;" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach($kategoris as $k)
                                        <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Pameran *</label>
                                <select name="pameran_id" class="form-select rounded-0 border-0 border-bottom bg-light px-0 py-2" style="box-shadow: none;" required>
                                    <option value="" disabled selected>Pilih Pameran</option>
                                    @foreach($pamerans as $p)
                                        <option value="{{ $p->id }}" {{ old('pameran_id') == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Image Upload -->
                            <div class="col-md-12 mb-4">
                                <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Visual Upload *</label>
                                <div class="border p-3 text-center bg-light">
                                    <input type="file" name="gambar" class="form-control rounded-0 border-0 bg-transparent @error('gambar') is-invalid @enderror" required id="imgInput">
                                    <div id="imgPreview" class="mt-3 d-none">
                                        <p class="small text-uppercase text-muted mb-2" style="letter-spacing: 1px;">Preview Digital</p>
                                        <img src="" class="img-fluid rounded-0 border shadow-sm" style="max-height: 250px; filter: grayscale(20%);">
                                    </div>
                                </div>
                                @error('gambar') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="col-md-12 mb-5">
                                <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Deskripsi Singkat / Narasi</label>
                                <textarea name="deskripsi" class="form-control rounded-0 border-0 border-bottom bg-light px-0" 
                                          rows="3" style="box-shadow: none;" 
                                          placeholder="Tuliskan latar belakang karya...">{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>

                        <!-- Aksi Form -->
                        <div class="d-grid gap-3">
                            <button type="submit" class="btn btn-dark py-3 rounded-0 fw-bold text-uppercase" style="letter-spacing: 2px; font-size: 0.8rem;">
                                <i class="bi bi-cloud-arrow-up me-2"></i>Simpan ke Dalam Koleksi
                            </button>
                            <a href="{{ route('karya-seni.index') }}" class="btn btn-outline-secondary py-2 rounded-0 small text-uppercase" style="letter-spacing: 1px; font-size: 0.7rem;">
                                Batalkan Pengunggahan
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Sinkronisasi input dengan estetika monokrom */
    .form-control:focus, .form-select:focus {
        background-color: #f1f1f1 !important;
        border-color: #000 !important;
    }
    
    /* Menghilangkan border biru bawaan browser */
    select {
        cursor: pointer;
    }
</style>

<script>
    document.getElementById('imgInput').onchange = function (evt) {
        const [file] = this.files;
        if (file) {
            const preview = document.getElementById('imgPreview');
            preview.classList.remove('d-none');
            preview.querySelector('img').src = URL.createObjectURL(file);
        }
    }
</script>
@endsection