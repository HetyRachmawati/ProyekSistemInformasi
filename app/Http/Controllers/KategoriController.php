<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $categories = Kategori::all(); // Mengambil semua data kategori
        return view('super-admin.kategori.index', compact('categories'));
    }

    public function create()
    {
        return view('super-admin.kategori.create'); // Menampilkan form create
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create($request->only('nama_kategori'));

        return redirect()->route('super-admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('super-admin.kategori.edit', compact('kategori')); // Menampilkan form edit
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_template,nama_kategori,' . $kategori->id,
        ]);

        $kategori->update($request->only('nama_kategori')); // Memperbarui data kategori

        return redirect()->route('super-admin.kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete(); // Menghapus data kategori

        return redirect()->route('super-admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
