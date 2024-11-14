<?php

namespace App\Http\Controllers;

use App\Models\Manajemen;
use App\Models\DataOki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManajemenKegiatanController extends Controller
{

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
            $manajemenKegiatan = Manajemen::with('dataOki')->paginate(10); 
            return view('super-admin.manajemen_kegiatan.index', compact('manajemenKegiatan'));
        }
        if ($user->role === 'AdminOki') {
            $manajemenKegiatan = Manajemen::with('dataOki')->paginate(10); 
            return view('admin-oki.manajemen_kegiatan.index', compact('manajemenKegiatan'));
        }
    
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
    

    public function create()
    {
        $this->authorizeAccess('AdminOki');  

        $dataOki = DataOki::all();
        return view('admin-oki.manajemen_kegiatan.create', compact('dataOki'));
    }


    public function store(Request $request)
    {
        $this->authorizeAccess('AdminOki');  
        $request->validate([
            'nama_kegiatan' => 'required|max:150',
            'id_oki' => 'required|exists:oki_baru,id', 
            'tgl_kegiatan' => 'required|date', 
            'proposal_kegiatan' => 'nullable|file|mimes:pdf|max:5120', 
        ]);
    
        if ($request->hasFile('proposal_kegiatan')) {
            $file = $request->file('proposal_kegiatan');
            $filePath = $file->storeAs('proposals', uniqid() . '.' . $file->getClientOriginalExtension(), 'public');
        } else {
            $filePath = null;
        }
    
        // Simpan data ke database
        Manajemen::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'id_oki' => $request->id_oki,
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'proposal_kegiatan' => $filePath,  
            'umpan_balik' => null,  
            'status_proposal' => 'diproses',  
        ]);
    
        return redirect()->route('admin-oki.manajemen_kegiatan.index');
    }
    

    public function edit($id)
    {
        if (Auth::user()->role === 'SuperAdmin') {
            $manajemenKegiatan = Manajemen::findOrFail($id);
            return view('super-admin.manajemen_kegiatan.edit', compact('manajemenKegiatan'));
        } elseif (Auth::user()->role === 'AdminOki') {
            $manajemenKegiatan = Manajemen::findOrFail($id);
            $dataOki = DataOki::all();
            return view('admin-oki.manajemen_kegiatan.edit', compact('manajemenKegiatan', 'dataOki'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    
  
    public function update(Request $request, $id)
    {
        $this->authorizeAccess('AdminOki');
        
        $request->validate([
            'nama_kegiatan' => 'required|max:150',
            'id_oki' => 'nullable|exists:oki_baru,id',
            'tgl_kegiatan' => 'nullable|date',
            'proposal_kegiatan' => 'nullable|max:255',
            'status_proposal' => 'nullable|in:diproses,disetujui,ditolak,selesai'
        ]);

        $kegiatan = Manajemen::findOrFail($id);
        $kegiatan->update($request->all());
        return redirect()->route('admin-oki.manajemen_kegiatan.index');
    }


    public function destroy($id)
    {
        $this->authorizeAccess('AdminOki');
        $kegiatan = Manajemen::findOrFail($id);
        $kegiatan->delete();
        return redirect()->route('admin-oki.manajemen_kegiatan.index');
    }
    public function showAdminOki($id)
    {
        $this->authorizeAccess('AdminOki');
        $kegiatan = Manajemen::findOrFail($id);
        return view('admin-oki.manajemen_kegiatan.show', compact('kegiatan'));
    }

    public function updateUmpanBalik(Request $request, $id)
    {
        $this->authorizeAccess('SuperAdmin'); 
            $request->validate([
            'umpan_balik' => 'nullable|string|max:255',
        ]);
            $kegiatan = Manajemen::findOrFail($id);
            $kegiatan->update([
            'umpan_balik' => $request->umpan_balik,
        ]);
            return redirect()->route('super-admin.manajemen_kegiatan.index');
    }
    
    public function tolak($id)
    {
        $this->authorizeAccess('SuperAdmin');
        
        $kegiatan = Manajemen::findOrFail($id);
        $kegiatan->update(['status_proposal' => 'ditolak']);
        return redirect()->route('super-admin.manajemen_kegiatan.index');
    }


    public function setujui($id)
    {
        $this->authorizeAccess('SuperAdmin');
        
        $kegiatan = Manajemen::findOrFail($id);
        $kegiatan->update(['status_proposal' => 'disetujui']);
        return redirect()->route('super-admin.manajemen_kegiatan.index');
    }
}