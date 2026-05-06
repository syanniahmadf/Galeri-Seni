<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Seniman;
use Illuminate\Http\Request;

class SenimanController extends Controller {
    public function index() {
        // Mengambil data seniman beserta jumlah karya mereka
        $data = Seniman::withCount('karyaSenis')->get();
        return view('admin.seniman.index', compact('data'));
    }

    public function create() {
        return view('admin.seniman.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'negara' => 'required|string|max:100',
        ]);
        Seniman::create($request->all());
        return redirect()->route('seniman.index')->with('success', 'Seniman berhasil ditambahkan.');
    }

    public function edit(Seniman $seniman) {
        return view('admin.seniman.edit', compact('seniman'));
    }

    public function update(Request $request, Seniman $seniman) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'negara' => 'required|string|max:100',
        ]);
        $seniman->update($request->all());
        return redirect()->route('seniman.index')->with('success', 'Data seniman berhasil diperbarui.');
    }

    public function destroy(Seniman $seniman) {
        // Karena onDelete('cascade'), karya seni terkait otomatis terhapus di DB
        $seniman->delete();
        return redirect()->route('seniman.index')->with('success', 'Seniman berhasil dihapus.');
    }
}