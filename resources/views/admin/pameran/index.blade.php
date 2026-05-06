@extends('layouts.admin')

@section('title', 'Manajemen Pameran')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-5 align-items-end">
        <div class="col-md-8">
            <h2 class="fw-bold text-dark mb-1" style="font-family: 'Playfair Display', serif;">JADWAL PAMERAN</h2>
            <p class="text-muted small text-uppercase" style="letter-spacing: 3px;">Manajemen Lokasi & Waktu Pameran</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('pameran.create') }}" class="btn btn-dark shadow-sm px-4 py-2 rounded-0 fw-bold" style="font-size: 0.75rem; letter-spacing: 1px;">
                <i class="bi bi-calendar-plus me-2"></i>TAMBAH PAMERAN
            </a>
        </div>
    </div>

    <!-- Exhibition Table Card -->
    <div class="card shadow-sm border-0 rounded-0 overflow-hidden">
        <div class="card-header bg-white py-4 px-4 border-bottom">
            <h5 class="fw-bold mb-0 text-uppercase" style="letter-spacing: 2px; font-size: 0.9rem;">Agenda Pameran Aktif</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr class="text-uppercase small" style="letter-spacing: 1px;">
                        <th class="ps-4 py-3" width="80">No</th>
                        <th class="py-3">Nama Pameran</th>
                        <th class="py-3">Lokasi Galeri</th>
                        <th class="py-3">Jadwal Pelaksanaan</th>
                        <th class="py-3">Kapasitas Karya</th>
                        <th class="py-3 pe-4 text-center" width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $index => $item)
                    <tr>
                        <td class="ps-4 py-3 text-muted">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="py-3">
                            <span class="fw-bold d-block text-dark">{{ $item->nama }}</span>
                            <span class="text-muted small" style="font-size: 0.7rem;">EVENT-ID #{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="py-3 fw-medium">
                            <i class="bi bi-geo-alt me-1 text-dark"></i> {{ $item->lokasi }}
                        </td>
                        <td class="py-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-calendar3 me-2 text-dark"></i>
                                <span class="small fw-bold">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</span>
                            </div>
                        </td>
                        <td class="py-3">
                            <span class="badge rounded-0 border text-dark fw-bold px-3 py-2" style="background: #f8f9fa; font-size: 0.7rem;">
                                {{ $item->karya_senis_count ?? 0 }} ITEMS
                            </span>
                        </td>
                        <td class="py-3 pe-4 text-center">
                            <div class="btn-group">
                                <a href="{{ route('pameran.edit', $item->id) }}" class="btn btn-sm btn-outline-dark rounded-0 border-0" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <!-- Tombol Hapus dengan Data Attribute yang Bersih -->
                                <button type="button" 
                                        class="btn btn-sm btn-outline-dark rounded-0 border-0 btn-delete" 
                                        data-url="{{ route('pameran.destroy', $item->id) }}"
                                        title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-calendar-x text-light display-4 d-block mb-3"></i>
                            <p class="text-muted text-uppercase small" style="letter-spacing: 2px;">Belum ada jadwal pameran dalam arsip.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Monokrom -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0 border-0 shadow-lg">
            <div class="modal-body p-5 text-center">
                <div class="mb-4">
                    <i class="bi bi-exclamation-octagon text-dark" style="font-size: 4rem;"></i>
                </div>
                
                <h4 class="fw-bold mb-3" style="font-family: 'Playfair Display', serif; letter-spacing: -1px;">KONFIRMASI PENGHAPUSAN</h4>
                
                <p class="text-muted small text-uppercase mb-5" style="letter-spacing: 2px;">
                    Apakah Anda yakin ingin menghapus jadwal pameran ini? Seluruh referensi karya pada pameran ini akan dilepaskan.
                </p>

                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-dark py-3 rounded-0 fw-bold text-uppercase" style="letter-spacing: 2px; font-size: 0.75rem;">
                            Hapus Permanen
                        </button>
                        <button type="button" class="btn btn-outline-secondary py-2 rounded-0 small text-uppercase" style="letter-spacing: 1px; font-size: 0.7rem;" data-bs-dismiss="modal">
                            Batalkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script Delete Handling yang Bersih -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        const deleteForm = document.getElementById('deleteForm');
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const url = this.getAttribute('data-url');
                deleteForm.action = url;
                deleteModal.show();
            });
        });
    });
</script>
@endsection