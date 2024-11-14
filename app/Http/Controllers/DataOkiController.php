<?php

namespace App\Http\Controllers;

use App\Models\DataOki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataOkiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $user = Auth::user(); 
     
         if ($user->role === 'SuperAdmin') {
             $dataOki = DataOki::all(); 
             return view('super-admin.dataoki.index', compact('dataOki'));
         }
     
         if ($user->role === 'AdminOki') {
             $dataOki = DataOki::all(); 
             return view('admin-oki.dataoki.index', compact('dataOki'));
         }
     
         abort(403, 'Anda tidak memiliki akses ke halaman ini.');
     }
     

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorizeAccess('SuperAdmin');
        return view('super-admin.dataoki.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorizeAccess('SuperAdmin');

        $validatedData = $request->validate([
            'nama_oki' => 'required|string|max:100',
        ]);

        DataOki::create($validatedData);

        return redirect()->route('super-admin.data_oki.index')->with('success', 'Data OKI berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataOki $dataOki)
    {
        return view('super-admin.dataoki.show', compact('dataOki'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataOki $dataOki)
    {
        $this->authorizeAccess('SuperAdmin');
        return view('super-admin.dataoki.edit', compact('dataOki'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataOki $dataOki)
    {
        $this->authorizeAccess('SuperAdmin');

        $validatedData = $request->validate([
            'nama_oki' => 'required|string|max:100',
        ]);

        $dataOki->update($validatedData);

        return redirect()->route('super-admin.data_oki.index')->with('success', 'Data OKI berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataOki $dataOki)
    {
        $this->authorizeAccess('SuperAdmin');

        $dataOki->delete();

        return redirect()->route('super-admin.data_oki.index')->with('success', 'Data OKI berhasil dihapus');
    }

    /**
     * Check if the user has the correct access role.
     */
    private function authorizeAccess($role)
    {
        if (Auth::user()->role !== $role) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
}
