@extends('layouts.admin')

@section('title', 'Detail Koleksi Seni')

@section('content')
<div class="container-fluid">
    <!-- Header Navigasi -->
    <div class="mb-5 d-flex align-items-center justify-content-between">
        <a href="{{ route('karya-seni.index') }}" class="text-decoration-none text-muted small fw-bold text-uppercase" style="letter-spacing: 1px;">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Katalog
        </a>
        <div class="d-flex gap-3">
            <a href="{{ route('karya-seni.edit', $karya_seni->id) }}" class="btn btn-outline-dark rounded-0 px-4 fw-bold small text-uppercase" style="letter-spacing: 1px;">
                <i class="bi bi-pencil-square me-2"></i>Edit Detail
            </a>
        </div>
    </div>

    <div class="row g-5">
        <!-- Sisi Kiri: Visual Karya (The Canvas) -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-0 overflow-hidden bg-white p-3">
                <div class="position-relative border shadow-inner" style="background-color: #f8f8f8;">
                    <img src="{{ asset('storage/' . $karya_seni->gambar) }}" 
                         class="img-fluid w-100" 
                         style="object-fit: contain; max-height: 700px;"
                         alt="{{ $karya_seni->judul }}">
                    
                    <!-- ID Badge di Sudut Gambar -->
                    <div class="position-absolute bottom-0 end-0 m-4">
                        <span class="bg-dark text-white px-3 py-1 small fw-bold text-uppercase" style="letter-spacing: 2px; font-size: 0.65rem;">
                            REF-{{ str_pad($karya_seni->id, 5, '0', STR_PAD_LEFT) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sisi Kanan: Informasi Curatorial (The Metadata) -->
        <div class="col-lg-5">
            <div class="d-flex flex-column h-100">
                <!-- Judul & Seniman -->
                <div class="mb-5 border-bottom pb-4">
                    <span class="badge rounded-0 border text-dark fw-bold px-3 py-2 mb-3" style="background: #f8f9fa; font-size: 0.7rem; letter-spacing: 1px;">
                        {{ strtoupper($karya_seni->kategori->nama) }}
                    </span>
                    <h1 class="fw-bold text-dark mb-2" style="font-family: 'Playfair Display', serif; font-size: 3rem; line-height: 1.1;">
                        {{ $karya_seni->judul }}
                    </h1>
                    <p class="text-muted text-uppercase mb-0" style="letter-spacing: 3px; font-size: 0.85rem;">
                        By <span class="text-dark fw-bold">{{ $karya_seni->seniman->nama }}</span>
                    </p>
                </div>

                <!-- Informasi Teknis -->
                <div class="row g-4 mb-5">
                    <div class="col-6">
                        <label class="small text-muted text-uppercase fw-bold d-block mb-2" style="letter-spacing: 1px; font-size: 0.65rem;">Asal Negara</label>
                        <p class="fw-bold text-dark mb-0"><i class="bi bi-globe me-2"></i>{{ $karya_seni->seniman->negara }}</p>
                    </div>
                    <div class="col-6">
                        <label class="small text-muted text-uppercase fw-bold d-block mb-2" style="letter-spacing: 1px; font-size: 0.65rem;">Agenda Pameran</label>
                        <p class="fw-bold text-dark mb-0"><i class="bi bi-easel me-2"></i>{{ $karya_seni->pameran->nama }}</p>
                    </div>
                    <div class="col-12">
                        <div class="p-3 bg-light border-start border-dark border-4">
                            <label class="small text-muted text-uppercase fw-bold d-block mb-1" style="letter-spacing: 1px; font-size: 0.6rem;">Lokasi & Waktu Pelaksanaan</label>
                            <span class="small fw-bold text-dark">
                                {{ $karya_seni->pameran->lokasi }} 
                                <span class="mx-2 text-muted opacity-50">/</span> 
                                {{ \Carbon\Carbon::parse($karya_seni->pameran->tanggal)->translatedFormat('d F Y') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi / Narasi Kurator -->
                <div class="mb-5">
                    <h6 class="fw-bold text-uppercase mb-3" style="letter-spacing: 2px; font-size: 0.75rem;">DESKRIPSI</h6>
                    <div class="lh-lg text-muted small" style="text-align: justify; border-left: 1px solid #eee; padding-left: 20px;">
                        {{ $karya_seni->deskripsi ?: 'Tidak ada narasi tambahan untuk karya ini.' }}
                    </div>
                </div>

                <!-- Timestamp -->
                <div class="mt-auto pt-4 border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted italic" style="font-size: 0.7rem;">
                            Vault Entry: {{ $karya_seni->created_at->format('d/m/Y') }}
                        </small>
                        <small class="text-muted italic" style="font-size: 0.7rem;">
                            Last Modified: {{ $karya_seni->updated_at->format('d/m/Y H:i') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Efek shadow khusus untuk bingkai gambar mahakarya */
    .shadow-inner {
        box-shadow: inset 0 0 10px rgba(0,0,0,0.05);
    }
    
    /* Menghaluskan tampilan teks narasi */
    .lh-lg {
        line-height: 1.8 !important;
    }
</style>
@endsection