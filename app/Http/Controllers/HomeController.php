<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::all(); 
        return view('super-admin.home.index', compact('homes')); 
    }

    public function create()
    {
        return view('super-admin.home.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:1000',
            'deskripsi' => 'nullable',
            'file' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:10000',
        ]);

        $data = $request->except(['_token']);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $data['file'] = $fileName;
        }

        Home::create($data); 

        return redirect()->route('super-admin.home.index')->with('success', 'Home created successfully.');
    }

    public function edit(Home $home)
    {
        return view('super-admin.home.edit', compact('home')); 
    }

    public function update(Request $request, Home $home)
    {
        $request->validate([
            'judul' => 'required|max:1000',
            'deskripsi' => 'nullable',
            'file' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:10000',
        ]);

        $data = $request->except(['_token', '_method']);

        // Handle file upload
        if ($request->hasFile('file')) {
            if ($home->file && File::exists(public_path('uploads/' . $home->file))) {
                File::delete(public_path('uploads/' . $home->file));
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $data['file'] = $fileName;
        }

        $home->update($data); 

        return redirect()->route('super-admin.home.index')->with('success', 'Home updated successfully.');
    }

    public function destroy(Home $home)
    {
        if ($home->file && File::exists(public_path('uploads/' . $home->file))) {
            File::delete(public_path('uploads/' . $home->file));
        }

        $home->delete(); 
        return redirect()->route('super-admin.home.index')->with('success', 'Home deleted successfully.');
    }
}
