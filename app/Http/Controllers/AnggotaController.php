<?php

namespace App\Http\Controllers;

use App\Models\DataDivisi;
use App\Models\User;
use App\Models\DataOki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
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
            $anggotas = User::with(['dataOki', 'dataDivisi'])
                            ->where('role', 'user')
                            ->paginate(10);
            return view('super-admin.anggota.index', compact('anggotas'));
        }
    
        if ($user->role === 'AdminOki') {
            $anggotas = User::with(['dataOki', 'dataDivisi'])
                            ->where('role', 'user')
                            ->paginate(10);
            return view('admin-oki.anggota.index', compact('anggotas'));
        }
    
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    public function create()
    {
        $this->authorizeAccess('SuperAdmin');
        
        $dataOki = DataOki::all();
        $dataDivisi = DataDivisi::all();
    
        return view('super-admin.anggota.create', compact('dataOki', 'dataDivisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:150',
            'nim' => 'required|string|max:50|unique:users',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'no_hp' => 'required|string|max:20',
            'jabatan' => 'required|string|max:100',
            'periode' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'status_keaktifan' => 'nullable|in:aktif,nonaktif',
        ]);

        $user = Auth::user();
        $role = 'user';
        if ($user->role === 'SuperAdmin') {
            $role = 'AdminOki';
        } elseif ($user->role === 'AdminOki') {
            $role = 'User';
        }

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'periode' => $request->periode,
            'jurusan' => $request->jurusan,
            'status_keaktifan' => $request->status_keaktifan,
            'role' => $role,
        ]);

        return redirect()->route('super-admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $anggota = User::with(['dataOki', 'dataDivisi'])->findOrFail($id);
        $dataOki = DataOki::all();
        $dataDivisi = DataDivisi::all();
    
        return view('super-admin.anggota.edit', compact('anggota', 'dataOki', 'dataDivisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:150',
            'nim' => 'required|string|max:50|unique:users,nim,' . $id,
            'email' => 'required|email|max:100|unique:users,email,' . $id,
            'no_hp' => 'required|string|max:20',
            'jabatan' => 'required|string|max:100',
            'periode' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'status_keaktifan' => 'nullable|in:aktif,nonaktif',
            'id_oki' => 'nullable|exists:oki_baru,id',
            'id_divisi' => 'nullable|exists:divisi_baru,id',
        ]);
    
        $anggota = User::findOrFail($id);
    
        $anggota->update($request->except('password'));
    
        if ($request->filled('password')) {
            $anggota->update([
                'password' => Hash::make($request->password),
            ]);
        }
    
        return redirect()->route('super-admin.anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggota = User::findOrFail($id);
        $anggota->delete();

        return redirect()->route('super-admin.anggota.index')->with('success', 'Anggota berhasil dihapus!');
    }
}
