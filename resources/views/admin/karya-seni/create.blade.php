@extends('layouts.admin')
@section('content')
<div class="card shadow-sm border-0 max-width-700 mx-auto">
    <div class="card-body p-4">
        <h4 class="fw-bold mb-4">Tambah Karya Seni Baru</h4>
        <form action="{{ route('karya-seni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Judul Karya</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Seniman</label>
                    <select name="seniman_id" class="form-select">
                        @foreach($senimans as $s) <option value="{{ $s->id }}">{{ $s->nama }}</option> @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Kategori</label>
                    <select name="kategori_id" class="form-select">
                        @foreach($kategoris as $k) <option value="{{ $k->id }}">{{ $k->nama }}</option> @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Pameran</label>
                    <select name="pameran_id" class="form-select">
                        @foreach($pamerans as $p) <option value="{{ $p->id }}">{{ $p->nama }}</option> @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold">Upload Gambar</label>
                    <input type="file" name="gambar" class="form-control" id="imgInput" accept="image/*" required>
                    <img id="preview" class="mt-3 rounded shadow-sm d-none" style="max-height: 200px">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Simpan Karya Seni</button>
        </form>
    </div>
</div>

<script>
    imgInput.onchange = evt => {
        const [file] = imgInput.files
        if (file) {
            preview.src = URL.createObjectURL(file)
            preview.classList.remove('d-none')
        }
    }
</script>
@endsection