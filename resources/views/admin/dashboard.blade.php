@extends('layouts.admin')

@section('title', 'Dashboard Statistik')

@section('content')
<div class="row mb-5 align-items-end">
    <div class="col-md-8">
        <h2 class="fw-bold text-dark mb-1" style="font-family: 'Playfair Display', serif;">DASHBOARD</h2>
        <p class="text-muted small text-uppercase" style="letter-spacing: 3px;">Statistik Operasional Galeri</p>
    </div>
    <div class="col-md-4 text-md-end">
        <span class="text-muted small">Update Terakhir: <span class="text-dark fw-bold">{{ date('H:i') }} WIB</span></span>
    </div>
</div>

<div class="row g-4">
    <!-- Card Total Seniman -->
    <div class="col-md-3">
        <div class="card p-4 border-0 shadow-sm position-relative overflow-hidden h-100">
            <div class="position-absolute top-0 start-0 h-100" style="width: 4px; background: #000;"></div>
            <small class="text-muted fw-bold text-uppercase mb-2 d-block" style="letter-spacing: 1px; font-size: 0.65rem;">Total Seniman</small>
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="fw-bold mb-0">{{ $stats['total_seniman'] }}</h2>
                <i class="bi bi-person-bounding-box fs-3 text-light"></i>
            </div>
        </div>
    </div>

    <!-- Card Total Kategori -->
    <div class="col-md-3">
        <div class="card p-4 border-0 shadow-sm position-relative overflow-hidden h-100">
            <div class="position-absolute top-0 start-0 h-100" style="width: 4px; background: #888;"></div>
            <small class="text-muted fw-bold text-uppercase mb-2 d-block" style="letter-spacing: 1px; font-size: 0.65rem;">Kategori Koleksi</small>
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="fw-bold mb-0">{{ $stats['total_kategori'] }}</h2>
                <i class="bi bi-collection fs-3 text-light"></i>
            </div>
        </div>
    </div>

    <!-- Card Total Pameran -->
    <div class="col-md-3">
        <div class="card p-4 border-0 shadow-sm position-relative overflow-hidden h-100">
            <div class="position-absolute top-0 start-0 h-100" style="width: 4px; background: #444;"></div>
            <small class="text-muted fw-bold text-uppercase mb-2 d-block" style="letter-spacing: 1px; font-size: 0.65rem;">Event Pameran</small>
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="fw-bold mb-0">{{ $stats['total_pameran'] }}</h2>
                <i class="bi bi-easel2 fs-3 text-light"></i>
            </div>
        </div>
    </div>

    <!-- Card Total Karya -->
    <div class="col-md-3">
        <div class="card p-4 border-0 shadow-sm bg-dark position-relative overflow-hidden h-100">
            <small class="text-white-50 fw-bold text-uppercase mb-2 d-block" style="letter-spacing: 1px; font-size: 0.65rem;">Total Karya Seni</small>
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="fw-bold mb-0 text-white">{{ $stats['total_karya'] }}</h2>
                <i class="bi bi-palette fs-3 text-white-50"></i>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0 mt-5">
    <div class="card-header bg-white py-4 px-4 border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0 text-uppercase" style="letter-spacing: 2px; font-size: 0.9rem;">Koleksi Terbaru</h5>
            <a href="{{ route('karya-seni.index') }}" class="btn btn-sm btn-outline-dark rounded-0 fw-bold" style="font-size: 0.7rem;">LIHAT SEMUA</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr class="text-uppercase small" style="letter-spacing: 1px;">
                    <th class="ps-4 py-3">Karya</th>
                    <th class="py-3">Seniman</th>
                    <th class="py-3">Kategori</th>
                    <th class="py-3 pe-4 text-end">Ditambahkan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latest_karya as $item)
                <tr>
                    <td class="ps-4 py-3">
                        <span class="fw-bold d-block text-dark">{{ $item->judul }}</span>
                        <span class="text-muted small">REF-{{ str_pad($item->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td class="py-3 fw-medium">{{ $item->seniman->nama }}</td>
                    <td class="py-3">
                        <span class="badge rounded-0 border text-dark fw-normal px-3 py-2" style="background: #f8f9fa;">
                            {{ $item->kategori->nama }}
                        </span>
                    </td>
                    <td class="py-3 pe-4 text-end text-muted small">{{ $item->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection