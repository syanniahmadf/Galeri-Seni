<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Pameran;
use Illuminate\Http\Request;

class PameranController extends Controller {
    public function index() {
        $data = Pameran::withCount('karyaSenis')->get();
        return view('admin.pameran.index', compact('data'));
    }

    public function create() {
        return view('admin.pameran.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date'
        ]);
        Pameran::create($request->all());
        return redirect()->route('pameran.index')->with('success', 'Pameran berhasil dijadwalkan.');
    }

    public function edit(Pameran $pameran) {
        return view('admin.pameran.edit', compact('pameran'));
    }

    public function update(Request $request, Pameran $pameran) {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date'
        ]);
        $pameran->update($request->all());
        return redirect()->route('pameran.index')->with('success', 'Pameran berhasil diperbarui.');
    }

    public function destroy(Pameran $pameran) {
        $pameran->delete();
        return redirect()->route('pameran.index')->with('success', 'Pameran berhasil dihapus.');
    }
}
