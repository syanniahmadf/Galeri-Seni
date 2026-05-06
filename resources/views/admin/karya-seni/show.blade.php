@extends('layouts.admin')
@section('content')
<div class="mb-4">
    <a href="{{ route('karya-seni.index') }}" class="text-decoration-none text-muted">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
    </a>
</div>

<div class="row">
    <div class="col-md-5 mb-4">
        <div class="card h-100 overflow-hidden shadow">
            <img src="{{ asset('storage/' . $karya_seni->gambar) }}" class="img-fluid" style="height: 100%; object-fit: cover;">
        </div>
    </div>
    <div class="col-md-7">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h2 class="fw-bold mb-0 text-primary">{{ $karya_seni->judul }}</h2>
                    <a href="{{ route('karya-seni.edit', $karya_seni->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-pencil me-1"></i> Edit Karya
                    </a>
                </div>
                <hr>
                <div class="row gy-3">
                    <div class="col-6">
                        <small class="text-muted d-block">Seniman</small>
                        <span class="fw-bold">{{ $karya_seni->seniman->nama }} ({{ $karya_seni->seniman->negara }})</span>
                    </div>
                    <div class="col-6">
                        <small class="text-muted d-block">Kategori</small>
                        <span class="badge bg-info text-dark">{{ $karya_seni->kategori->nama }}</span>
                    </div>
                    <div class="col-6">
                        <small class="text-muted d-block">Pameran</small>
                        <span class="fw-bold">{{ $karya_seni->pameran->nama }}</span>
                    </div>
                    <div class="col-6">
                        <small class="text-muted d-block">Lokasi & Tanggal</small>
                        <span>{{ $karya_seni->pameran->lokasi }} | {{ $karya_seni->pameran->tanggal->format('d F Y') }}</span>
                    </div>
                    <div class="col-12 mt-4">
                        <h6 class="fw-bold">Deskripsi Karya</h6>
                        <p class="text-muted">{{ $karya_seni->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection