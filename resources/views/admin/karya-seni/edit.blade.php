@extends('layouts.admin')

@section('title', 'Edit Karya Seni')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12">
            <!-- Navigasi Kembali -->
            <div class="mb-4">
                <a href="{{ route('karya-seni.index') }}" class="text-decoration-none text-muted small fw-bold text-uppercase" style="letter-spacing: 1px;">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Katalog
                </a>
            </div>

            <!-- Card Form Edit -->
            <div class="card shadow-sm border-0 rounded-0">
                <div class="card-header bg-white py-4 px-4 border-bottom">
                    <h4 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif;">EDIT KARYA SENI</h4>
                    <p class="text-muted small text-uppercase mb-0" style="letter-spacing: 2px;">Pembaruan Metadata: <span class="text-dark">{{ $karya_seni->judul }}</span></p>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('karya-seni.update', $karya_seni->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-5">
                            <!-- Kolom Kiri: Input Data -->
                            <div class="col-md-7 border-end">
                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Judul Karya *</label>
                                    <input type="text" name="judul" 
                                           class="form-control rounded-0 border-0 border-bottom bg-light px-0 py-2 @error('judul') is-invalid @enderror" 
                                           style="box-shadow: none;"
                                           value="{{ old('judul', $karya_seni->judul) }}" required>
                                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Seniman *</label>
                                        <select name="seniman_id" class="form-select rounded-0 border-0 border-bottom bg-light px-0 py-2 shadow-none" required>
                                            @foreach($senimans as $s)
                                                <option value="{{ $s->id }}" {{ old('seniman_id', $karya_seni->seniman_id) == $s->id ? 'selected' : '' }}>
                                                    {{ $s->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Kategori *</label>
                                        <select name="kategori_id" class="form-select rounded-0 border-0 border-bottom bg-light px-0 py-2 shadow-none" required>
                                            @foreach($kategoris as $k)
                                                <option value="{{ $k->id }}" {{ old('kategori_id', $karya_seni->kategori_id) == $k->id ? 'selected' : '' }}>
                                                    {{ $k->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Pameran *</label>
                                    <select name="pameran_id" class="form-select rounded-0 border-0 border-bottom bg-light px-0 py-2 shadow-none" required>
                                        @foreach($pamerans as $p)
                                            <option value="{{ $p->id }}" {{ old('pameran_id', $karya_seni->pameran_id) == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama }} ({{ $p->lokasi }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Deskripsi Narasi</label>
                                    <textarea name="deskripsi" class="form-control rounded-0 border-0 border-bottom bg-light px-0 shadow-none" 
                                              rows="5" placeholder="Tuliskan latar belakang karya...">{{ old('deskripsi', $karya_seni->deskripsi) }}</textarea>
                                </div>
                            </div>

                            <!-- Kolom Kanan: Upload & Preview Gambar -->
                            <div class="col-md-5">
                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Visual Karya Seni</label>
                                    
                                    <!-- Area Preview Artistik -->
                                    <div class="mb-4 border rounded-0 p-2 text-center bg-light shadow-sm" style="min-height: 200px; display: flex; align-items: center; justify-content: center;">
                                        <img id="preview-img" src="{{ asset('storage/' . $karya_seni->gambar) }}" 
                                             class="img-fluid rounded-0" 
                                             style="max-height: 350px; object-fit: contain; filter: grayscale(10%);" 
                                             alt="Pratinjau Gambar">
                                    </div>

                                    <input type="file" name="gambar" id="input-gambar" class="form-control rounded-0 border-0 border-bottom bg-light @error('gambar') is-invalid @enderror shadow-none" accept="image/*">
                                    @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    
                                    <div class="mt-3 p-3 bg-white border border-dark border-opacity-10 rounded-0 italic small text-muted">
                                        <i class="bi bi-info-circle me-1"></i> Biarkan kosong jika tidak ingin mengganti visual. Format yang didukung: JPG, PNG (Maks 2MB).
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5 opacity-10">

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-dark px-5 py-3 rounded-0 fw-bold text-uppercase" style="letter-spacing: 2px; font-size: 0.8rem;">
                                <i class="bi bi-check2-all me-2"></i>Perbarui Data Koleksi
                            </button>
                            <a href="{{ route('karya-seni.index') }}" class="btn btn-outline-secondary px-4 py-3 rounded-0 small text-uppercase" style="letter-spacing: 1px; font-size: 0.7rem;">
                                Batalkan Perubahan
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Sinkronisasi fokus input monokrom */
    .form-control:focus, .form-select:focus {
        background-color: #f1f1f1 !important;
        border-color: #000 !important;
    }
    
    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
        background-position: right 0 center;
        background-size: 16px 12px;
    }
</style>

@push('scripts')
<script>
    // Script Pratinjau Gambar Minimalis
    document.getElementById('input-gambar').onchange = function (evt) {
        const [file] = this.files
        if (file) {
            document.getElementById('preview-img').src = URL.createObjectURL(file)
        }
    }
</script>
@endpush
@endsection