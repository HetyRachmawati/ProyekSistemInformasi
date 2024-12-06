<?php

namespace App\Http\Controllers;

use App\Models\DataDivisi;
use App\Models\DataOki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DataDivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     private function authorizeAccess($role)
     {
         if (Auth::user()->role !== $role) {
             abort(403, 'Anda tidak memiliki akses ke halaman ini.');
         }
     }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'SuperAdmin') {
        $dataDivisi = DataDivisi::with('dataOki')->paginate(10);
        return view('super-admin.data_divisi.index', compact('dataDivisi'));
    }
        if ($user->role === 'AdminOki') {
        $dataDivisi = DataDivisi::with('dataOki')
        ->where('id_oki',$user->id_oki)
        ->paginate(10);
       
        return view('admin-oki.data_divisi.index', compact('dataDivisi'));
    }

    abort(403, 'Anda tidak memiliki akses ke halaman ini.');
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $dataOki = DataOki::all(); // Mengambil semua data Oki
    
        // Jika user adalah SuperAdmin
        if ($user->role === 'SuperAdmin') {
            return view('super-admin.data_divisi.create', compact('dataOki'));
        }
    
        // Jika user adalah AdminOki
        if ($user->role === 'AdminOki') {
            return view('admin-oki.data_divisi.create', compact('dataOki'));
        }
    
        // Jika user tidak memiliki akses
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_divisi' => 'required|string|max:100',
            'id_oki' => 'required|exists:oki_baru,id',
        ]);
    
        DataDivisi::create([
            'nama_divisi' => $validatedData['nama_divisi'],
            'id_oki' => $validatedData['id_oki'], 
        ]);
    
        $user = Auth::user();
        
        if ($user->role === 'SuperAdmin') {
            return redirect()->route('super-admin.data_divisi.index')->with('success', 'Data Divisi berhasil ditambahkan');
        }
    
        if ($user->role === 'AdminOki') {
            return redirect()->route('admin-oki.data_divisi.index')->with('success', 'Data Divisi berhasil ditambahkan');
        }
    
        // Jika tidak memiliki akses
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(DataDivisi $dataDivisi)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataDivisi $dataDivisi)
    {
        $user = Auth::user();
        $dataOki = DataOki::all();

        if ($user->role === 'SuperAdmin') {
            return view('super-admin.data_divisi.edit', compact('dataDivisi', 'dataOki'));
        }

        if ($user->role === 'AdminOki') {
            return view('admin-oki.data_divisi.edit', compact('dataDivisi', 'dataOki'));
        }

        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataDivisi $dataDivisi)
    {
        $user = Auth::user();
    
        $validatedData = $request->validate([
            'nama_divisi' => 'required|string|max:100',
            'id_oki' => 'required|exists:oki_baru,id', 
        ]);
    
        $dataDivisi->update([
            'nama_divisi' => $validatedData['nama_divisi'],
            'id_oki' => $validatedData['id_oki'],
        ]);
    
        if ($user->role === 'SuperAdmin') {
            return redirect()->route('super-admin.data_divisi.index')->with('success', 'Data Divisi berhasil diubah');
        }
    
        if ($user->role === 'AdminOki') {
            return redirect()->route('admin-oki.data_divisi.index')->with('success', 'Data Divisi berhasil diubah');
        }
    
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataDivisi $dataDivisi)
    {
        $user = Auth::user(); 
    
        if ($user->role === 'SuperAdmin') {
            $dataDivisi->delete();
    
            return redirect()->route('super-admin.data_divisi.index')->with('success', 'Data Divisi berhasil dihapus');
        }
    
        if ($user->role === 'AdminOki') {
            $dataDivisi->delete();
    
            return redirect()->route('admin-oki.data_divisi.index')->with('success', 'Data Divisi berhasil dihapus');
        }
    
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
    
}
