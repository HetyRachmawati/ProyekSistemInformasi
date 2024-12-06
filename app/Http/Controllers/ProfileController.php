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

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $anggota = User::with(['dataOki', 'dataDivisi', 'periode', 'jurusan'])->findOrFail($id);
        $dataOki = DataOki::all();
        $dataDivisi = DataDivisi::all();
        $periodes = Periode::all();
        $jurusans = Jurusan::all();

        return view('profile.edit', compact('anggota', 'dataOki', 'dataDivisi','periodes','jurusans'));
    }
    
    /**
     * Update the user's profile information.
     */
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
        
        return redirect()->route('profile.edit', $id)->with('success', 'Profil berhasil diperbarui!');
    }
}
