<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Menampilkan daftar periode.
     */
    public function index()
    {
        $periodes = Periode::all();
        return view('super-admin.periode.index', compact('periodes'));
    }

    /**
     * Menampilkan form untuk menambah periode baru.
     */
    public function create()
    {
        return view('super-admin.periode.create');
    }

    /**
     * Menyimpan periode baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_periode' => 'required|unique:periode,tahun_periode|string|max:255',
        ]);

        Periode::create([
            'tahun_periode' => $request->tahun_periode,
        ]);

        return redirect()->route('super-admin.periode.index')->with('success', 'Periode berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit periode yang sudah ada.
     */
    public function edit(Periode $periode)
    {
        return view('super-admin.periode.edit', compact('periode'));
    }

    /**
     * Memperbarui periode yang ada.
     */
    public function update(Request $request, Periode $periode)
    {
        $request->validate([
            'tahun_periode' => 'required|string|max:255|unique:periode,tahun_periode,' . $periode->id,
        ]);

        $periode->update([
            'tahun_periode' => $request->tahun_periode,
        ]);

        return redirect()->route('super-admin.periode.index')->with('success', 'Periode berhasil diperbarui.');
    }

    /**
     * Menghapus periode yang ada.
     */
    public function destroy($id)
    {
        $periode = Periode::findOrFail($id);
        $periode->delete();

        return redirect()->route('super-admin.periode.index')->with('success', 'Periode berhasil dihapus.');
    }
}
