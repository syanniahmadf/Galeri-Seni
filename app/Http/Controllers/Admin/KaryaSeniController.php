<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KaryaSeni;
use App\Models\Seniman;
use App\Models\Kategori;
use App\Models\Pameran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryaSeniController extends Controller
{
    /**
     * Menampilkan daftar semua karya seni.
     */
    public function index()
    {
        // Mengambil data dengan eager loading untuk optimasi query
        $data = KaryaSeni::with(['seniman', 'kategori', 'pameran'])->latest()->get();
        return view('admin.karya-seni.index', compact('data'));
    }

    /**
     * Menampilkan form tambah karya seni.
     */
    public function create()
    {
        $senimans = Seniman::all();
        $kategoris = Kategori::all();
        $pamerans = Pameran::all();
        
        return view('admin.karya-seni.create', compact('senimans', 'kategoris', 'pamerans'));
    }

    /**
     * Menyimpan karya seni baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'seniman_id'  => 'required|exists:senimans,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'pameran_id'  => 'required|exists:pamerans,id',
            'gambar'      => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi'   => 'nullable|string',
        ]);

        // Proses Upload Gambar
        $path = $request->file('gambar')->store('karya', 'public');

        KaryaSeni::create([
            'judul'       => $request->judul,
            'seniman_id'  => $request->seniman_id,
            'kategori_id' => $request->kategori_id,
            'pameran_id'  => $request->pameran_id,
            'gambar'      => $path,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()->route('karya-seni.index')
                         ->with('success', 'Karya seni berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail karya seni.
     */
    public function show(KaryaSeni $karya_seni)
    {
        // Load relasi agar data seniman/kategori muncul di view detail
        $karya_seni->load(['seniman', 'kategori', 'pameran']);
        return view('admin.karya-seni.show', compact('karya_seni'));
    }

    /**
     * Menampilkan form edit karya seni.
     */
    public function edit(KaryaSeni $karya_seni)
    {
        $senimans = Seniman::all();
        $kategoris = Kategori::all();
        $pamerans = Pameran::all();
        
        return view('admin.karya-seni.edit', compact('karya_seni', 'senimans', 'kategoris', 'pamerans'));
    }

    /**
     * Memperbarui data karya seni di database.
     */
    public function update(Request $request, KaryaSeni $karya_seni)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'seniman_id'  => 'required|exists:senimans,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'pameran_id'  => 'required|exists:pamerans,id',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi'   => 'nullable|string',
        ]);

        $data = $request->only(['judul', 'seniman_id', 'kategori_id', 'pameran_id', 'deskripsi']);

        // Logika Ganti Gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari folder storage
            if ($karya_seni->gambar) {
                Storage::disk('public')->delete($karya_seni->gambar);
            }
            
            // Simpan gambar baru
            $path = $request->file('gambar')->store('karya', 'public');
            $data['gambar'] = $path;
        }

        $karya_seni->update($data);

        return redirect()->route('karya-seni.index')
                         ->with('success', 'Karya seni berhasil diperbarui!');
    }

    /**
     * Menghapus karya seni beserta file gambarnya.
     */
    public function destroy(KaryaSeni $karya_seni)
    {
        // Hapus file gambar secara fisik dari storage
        if ($karya_seni->gambar) {
            Storage::disk('public')->delete($karya_seni->gambar);
        }

        $karya_seni->delete();

        return redirect()->route('karya-seni.index')
                         ->with('success', 'Karya seni berhasil dihapus!');
    }
}