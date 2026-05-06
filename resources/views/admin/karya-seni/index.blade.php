@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Daftar Karya Seni</h3>
    <a href="{{ route('karya-seni.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-lg me-1"></i> Tambah Karya
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4">No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Seniman</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karya as $item)
                    <tr>
                        <td class="px-4">{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td class="fw-bold">{{ $item->judul }}</td>
                        <td>{{ $item->seniman->nama }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $item->kategori->nama }}</span></td>
                        <td>
                            <div class="btn-group shadow-sm">
                                <a href="{{ route('karya-seni.show', $item->id) }}" class="btn btn-sm btn-success text-white"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('karya-seni.edit', $item->id) }}" class="btn btn-sm btn-primary text-white"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('karya-seni.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus karya ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger rounded-end"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection