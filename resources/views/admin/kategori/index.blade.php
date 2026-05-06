@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-5 align-items-end">
        <div class="col-md-8">
            <h2 class="fw-bold text-dark mb-1" style="font-family: 'Playfair Display', serif;">KATEGORI</h2>
            <p class="text-muted small text-uppercase" style="letter-spacing: 3px;">Jenis Karya Seni</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('kategori.create') }}" class="btn btn-dark shadow-sm px-4 py-2 rounded-0 fw-bold" style="font-size: 0.75rem; letter-spacing: 1px;">
                <i class="bi bi-plus-lg me-2"></i>TAMBAH KATEGORI
            </a>
        </div>
    </div>

    <div class="row g-4">
        <!-- Category Table -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-0 overflow-hidden">
                <div class="card-header bg-white py-4 px-4 border-bottom">
                    <h5 class="fw-bold mb-0 text-uppercase" style="letter-spacing: 2px; font-size: 0.9rem;">Daftar Kategori</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr class="text-uppercase small" style="letter-spacing: 1px;">
                                <th class="ps-4 py-3" width="80">No</th>
                                <th class="py-3">Kategori</th>
                                <th class="py-3">Koleksi</th>
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
                                    <span class="fw-bold text-dark text-uppercase" style="letter-spacing: 1px;">{{ $item->nama }}</span>
                                </td>
                                <td class="py-3">
                                    <span class="badge rounded-0 border text-dark fw-bold px-3 py-2" style="background: #f8f9fa; font-size: 0.7rem;">
                                        {{ $item->karya_senis_count ?? 0 }} KARYA
                                    </span>
                                </td>
                                <td class="py-3 pe-4 text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm btn-outline-dark rounded-0 border-0" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <!-- Trigger Modal Hapus -->
                                        <button type="button" 
                                        class="btn btn-sm btn-outline-dark rounded-0 border-0 btn-delete" 
                                        data-url="{{ route('kategori.destroy', $item->id) }}"
                                        title="Hapus">
                                        <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <i class="bi bi-tag text-light display-4 d-block mb-3"></i>
                                    <p class="text-muted text-uppercase small" style="letter-spacing: 2px;">Belum ada kategori dalam sistem.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Info Panel Monokrom -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm bg-dark text-white p-4 rounded-0 position-relative overflow-hidden">
                <!-- Dekorasi -->
                <div class="position-absolute opacity-10" style="right: -20px; bottom: -20px; font-size: 8rem;">
                    <i class="bi bi-info-square"></i>
                </div>
                
                <h5 class="fw-bold text-uppercase mb-3" style="letter-spacing: 2px; font-size: 1rem; font-family: 'Playfair Display', serif;">Informasi</h5>
                <p class="small opacity-75 mb-4" style="line-height: 1.8;">
                    Kategori berfungsi sebagai metadata utama untuk mempermudah navigasi koleksi. Klasifikasi yang tepat (seperti Lukisan, Instalasi, atau Fotografi) menjaga standar profesionalisme inventaris galeri.
                </p>
                <div class="d-flex align-items-center gap-3 py-3 border-top border-secondary">
                    <i class="bi bi-shield-check fs-4"></i>
                    <span class="small text-uppercase fw-bold" style="letter-spacing: 1px;">Data bersifat unik & permanen</span>
                </div>
            </div>
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
                    Apakah Anda yakin ingin menghapus kategori ini? Seluruh karya seni yang terhubung akan kehilangan klasifikasinya.
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

<!-- Script Delete Handling -->
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