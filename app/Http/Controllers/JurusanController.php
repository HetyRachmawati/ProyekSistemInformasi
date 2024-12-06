<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();  // Mengambil semua data jurusan
        return view('super-admin.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('super-admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:jurusan',  // Validasi input
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,  // Menyimpan data jurusan
        ]);

        return redirect()->route('super-admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        return view('super-admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:jurusan,nama_jurusan,' . $jurusan->id,
        ]);

        $jurusan->update([
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect()->route('super-admin.jurusan.index')->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete(); 

        return redirect()->route('super-admin.jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
    }
}
