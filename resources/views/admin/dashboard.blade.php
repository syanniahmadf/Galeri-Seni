@extends('layouts.admin')

@section('title', 'Dashboard Statistik')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h3 class="fw-bold text-dark">Ringkasan Galeri</h3>
        <p class="text-muted">Data statistik operasional galeri seni saat ini.</p>
    </div>
</div>

<div class="row">
    <!-- Card Total Seniman -->
    <div class="col-md-3 mb-4">
        <div class="card p-3 border-0 shadow-sm" style="border-left: 5px solid #6c63ff !important;">
            <div class="d-flex align-items-center">
                <div class="rounded-circle p-3 bg-primary bg-opacity-10 me-3">
                    <i class="bi bi-people-fill h4 mb-0 text-primary"></i>
                </div>
                <div>
                    <small class="text-muted d-block">Total Seniman</small>
                    <h3 class="fw-bold mb-0">{{ $stats['total_seniman'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Kategori -->
    <div class="col-md-3 mb-4">
        <div class="card p-3 border-0 shadow-sm" style="border-left: 5px solid #f6ad55 !important;">
            <div class="d-flex align-items-center">
                <div class="rounded-circle p-3 bg-warning bg-opacity-10 me-3">
                    <i class="bi bi-tags-fill h4 mb-0 text-warning"></i>
                </div>
                <div>
                    <small class="text-muted d-block">Kategori</small>
                    <h3 class="fw-bold mb-0">{{ $stats['total_kategori'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Pameran -->
    <div class="col-md-3 mb-4">
        <div class="card p-3 border-0 shadow-sm" style="border-left: 5px solid #38a169 !important;">
            <div class="d-flex align-items-center">
                <div class="rounded-circle p-3 bg-success bg-opacity-10 me-3">
                    <i class="bi bi-calendar-event-fill h4 mb-0 text-success"></i>
                </div>
                <div>
                    <small class="text-muted d-block">Pameran</small>
                    <h3 class="fw-bold mb-0">{{ $stats['total_pameran'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Karya -->
    <div class="col-md-3 mb-4">
        <div class="card p-3 border-0 shadow-sm" style="border-left: 5px solid #e53e3e !important;">
            <div class="d-flex align-items-center">
                <div class="rounded-circle p-3 bg-danger bg-opacity-10 me-3">
                    <i class="bi bi-palette-fill h4 mb-0 text-danger"></i>
                </div>
                <div>
                    <small class="text-muted d-block">Karya Seni</small>
                    <h3 class="fw-bold mb-0">{{ $stats['total_karya'] }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm mt-4">
    <div class="card-header bg-white py-3 border-0">
        <h5 class="fw-bold mb-0">5 Koleksi Terbaru</h5>
    </div>
    <div class="table-responsive p-3">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Seniman</th>
                    <th>Kategori</th>
                    <th>Waktu Upload</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latest_karya as $item)
                <tr>
                    <td class="fw-bold">{{ $item->judul }}</td>
                    <td>{{ $item->seniman->nama }}</td>
                    <td><span class="badge bg-light text-dark border">{{ $item->kategori->nama }}</span></td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection