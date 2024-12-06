<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        
        $homes = Home::with('kategori')->get(); 
        return view('super-admin.home.index', compact('homes')); 

    }

    public function create()
    {
        $categories = Kategori::all(); 
        return view('super-admin.home.create', compact('categories')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:1000',
            'deskripsi' => 'nullable',
            'id_kategori' => 'required|exists:kategori_template,id',
            'gambar' => 'nullable|mimes:jpg,jpeg,png|max:10000',
            'link_template' => 'nullable|url',
        ]);

        $data = $request->except(['_token']);

       // Handle file upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $data['gambar'] = $fileName;
        } else {
            $data['gambar'] = 'default.jpg'; // Jika tidak ada gambar, set gambar default
        }

        // Menyimpan link
        $data['link_template'] = $request->input('link_template'); // Menyimpan link jika ada

        Home::create($data); 

        return redirect()->route('super-admin.home.index')->with('success', 'Home created successfully.');
    }

    public function edit(Home $home)
    {
        $categories = Kategori::all(); // Mengambil kategori untuk dropdown
        return view('super-admin.home.edit', compact('home', 'categories'));
    }

    public function update(Request $request, Home $home)
    {
        $request->validate([
            'judul' => 'required|max:1000',
            'deskripsi' => 'nullable',
            'id_kategori' => 'required|exists:kategori_template,id',
            'gambar' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:10000',
            'link_template' => 'nullable|url',
        ]);

        $data = $request->except(['_token', '_method']);

        // Handle file upload
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada dan file baru diupload
        if ($home->gambar && File::exists(public_path('uploads/' . $home->gambar))) {
            File::delete(public_path('uploads/' . $home->gambar));
        }

        // Proses upload gambar baru
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);
        $data['gambar'] = $fileName;
    } else {
        // Jika tidak ada gambar baru, pertahankan gambar lama
        $data['gambar'] = $home->gambar;
    }

    // Menyimpan link
    $data['link_template'] = $request->input('link_template'); // Menyimpan link jika ada

        $home->update($data); 

        return redirect()->route('super-admin.home.index')->with('success', 'Home updated successfully.');
    }

    public function destroy(Home $home)
    {
        if ($home->gambar && File::exists(public_path('uploads/' . $home->gambar))) {
            File::delete(public_path('uploads/' . $home->gambar));
        }

        $home->delete(); 
        return redirect()->route('super-admin.home.index')->with('success', 'Home deleted successfully.');
    }

    public function course()
    {
        $homes = Home::with('kategori')->get();
        
        // Mengirim data ke view
        return view('layouts.course', compact('homes'));
    }

}