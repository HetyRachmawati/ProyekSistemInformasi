<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataOki;
use App\Models\Jurusan;
use App\Models\Periode;
use App\Models\DataDivisi;
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
    
        $relations = ['dataOki', 'dataDivisi', 'periode', 'jurusan']; 
        
        if ($user->role === 'SuperAdmin') {
            $anggotas = User::with($relations)->paginate(10);
            return view('super-admin.anggota.index', compact('anggotas'));
        }
    
        if ($user->role === 'AdminOki') {
            $anggotas = User::with($relations)
                            ->where('role', 'user')
                            ->paginate(10);
            return view('admin-oki.anggota.index', compact('anggotas'));
        }
    
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
    

    public function create()
    {
        $user = Auth::user();
        $dataOki = DataOki::all();
        $dataDivisi = DataDivisi::all();
        $periodes = Periode::all();
        $jurusans = Jurusan::all();
    
        if ($user->role === 'SuperAdmin') {
            return view('super-admin.anggota.create', compact('dataOki', 'dataDivisi', 'periodes', 'jurusans'));
        }
    
        if ($user->role === 'AdminOki') {
            return view('admin-oki.anggota.create', compact('dataOki', 'dataDivisi', 'periodes', 'jurusans'));
        }
    
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
    

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_lengkap' => 'required|string|max:150',
                'nim' => 'required|string|max:50|unique:users',
                'email' => 'required|email|max:100|unique:users',
                'password' => 'required|string|min:6',
                'no_hp' => 'required|string|max:20',
                'jabatan' => 'required|string|max:100',
                'id_periode' => 'required|exists:periode,id',
                'id_jurusan' => 'required|exists:jurusan,id',
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
            'id_periode' => $request->id_periode,
            'id_jurusan' => $request->id_jurusan,
            'status_keaktifan' => $request->status_keaktifan,
            'role' => $role,
            'id_oki' => $request->id_oki, // Tambahkan ini
            'id_divisi' => $request->id_divisi, // Tambahkan ini
        ]);
            
    
            if ($user->role === 'SuperAdmin') {
                return redirect()->route('super-admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
            }
    
            if ($user->role === 'AdminOki') {
                return redirect()->route('admin-oki.anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
            }
    
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan anggota!');
        }
        
    }

    public function edit($id)
    {
        $user = Auth::user();
        $anggota = User::with(['dataOki', 'dataDivisi', 'periode', 'jurusan'])->findOrFail($id);
        $dataOki = DataOki::all();
        $dataDivisi = DataDivisi::all();
        $periodes = Periode::all();
        $jurusans = Jurusan::all();

        if ($user->role === 'SuperAdmin') {
            return view('super-admin.anggota.edit', compact('anggota', 'dataOki', 'dataDivisi', 'periodes', 'jurusans'));
        }

        if ($user->role === 'AdminOki') {
            return view('admin-oki.anggota.edit', compact('anggota', 'dataOki', 'dataDivisi', 'periodes', 'jurusans'));
        }

        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:150',
            'nim' => 'required|string|max:50|unique:users,nim,' . $id,
            'email' => 'required|email|max:100|unique:users,email,' . $id,
            'no_hp' => 'required|string|max:20',
            'jabatan' => 'required|string|max:100',
            'id_periode' => 'required|exists:periode,id',
            'id_jurusan' => 'required|exists:jurusan,id',
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

        if (Auth::user()->role === 'SuperAdmin') {
            return redirect()->route('super-admin.anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
        }

        if (Auth::user()->role === 'AdminOki') {
            return redirect()->route('admin-oki.anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
        }

        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $anggota = User::findOrFail($id);
        $anggota->delete();

        if ($user->role === 'SuperAdmin') {
            return redirect()->route('super-admin.anggota.index')->with('success', 'Anggota berhasil dihapus!');
        }

        if ($user->role === 'AdminOki') {
            return redirect()->route('admin-oki.anggota.index')->with('success', 'Anggota berhasil dihapus!');
        }

        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }


    public function showMemberList()
{
    $anggotas = User::with(['dataOki', 'dataDivisi', 'periode', 'jurusan'])->paginate(10);

    return view('memberlist', compact('anggotas'));
}

}


