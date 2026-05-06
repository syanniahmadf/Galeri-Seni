<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller {
    public function index() {
        $data = Kategori::withCount('karyaSenis')->get();
        return view('admin.kategori.index', compact('data'));
    }

    public function create() {
        return view('admin.kategori.create');
    }

    public function store(Request $request) {
        $request->validate(['nama' => 'required|unique:kategoris,nama']);
        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dibuat.');
    }

    public function edit(Kategori $kategori) {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori) {
        $request->validate(['nama' => 'required|unique:kategoris,nama,' . $kategori->id]);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori) {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
