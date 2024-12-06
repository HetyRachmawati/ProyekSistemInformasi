<?php

namespace App\Http\Controllers;

use App\Models\Manajemen;
use App\Models\DataOki;
use App\Models\User;
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
        // Pastikan hanya SuperAdmin yang dapat mengakses fungsi ini
        $this->authorizeAccess('SuperAdmin');
    
        // Validasi input umpan balik
        $request->validate([
            'umpan_balik' => 'nullable|string|max:255',
        ]);
    
        // Mengambil data kegiatan berdasarkan ID
        $kegiatan = Manajemen::findOrFail($id);
    
        // Update kegiatan dengan umpan balik yang diterima dari request
        $kegiatan->update([
            'umpan_balik' => $request->umpan_balik,
        ]);
    
        // Mendapatkan data pengguna AdminOki yang terkait dengan DataOki dari kegiatan ini
        // Hanya ambil pengguna yang memiliki role 'AdminOki'
        $adminOki = $kegiatan->dataOki->users()->where('role', 'AdminOki')->first();
    
        // Pastikan ada pengguna yang terhubung (AdminOki)
        if ($adminOki) {
            // Ambil nomor HP dan nama lengkap dari AdminOki
            $nomorHp = $adminOki->no_hp;  // Pastikan model User memiliki atribut 'no_hp'
            $namaLengkap = $adminOki->nama_lengkap;  // Pastikan model User memiliki atribut 'nama_lengkap'
    
            // Inisialisasi cURL untuk mengirimkan pesan
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',  // URL API Fonnte
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $nomorHp,  // Menggunakan nomor HP AdminOki
                    'message' => 'Hallo ' . $namaLengkap . ', umpan balik terbaru untuk kegiatan: ' . $kegiatan->nama_kegiatan . ' adalah: ' . $request->umpan_balik,  // Pesan dengan nama lengkap dan umpan balik
                    'countryCode' => '62',  // Pastikan kode negara sesuai
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: M8xs9bLniFSFLzZcU7nB'  // Token API Fonnte
                ),
            ));
    
            // Eksekusi cURL dan tangani respon
            $response = curl_exec($curl);
    
            // Cek jika ada error dalam cURL
            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
                // Jika ada error, tampilkan pesan error
                return response()->json(['error' => $error_msg], 500);
            }
    
            curl_close($curl);
    
            // Redirect ke halaman index setelah update
            return redirect()->route('super-admin.manajemen_kegiatan.index')->with('success', 'Pesan berhasil dikirim!');
        } else {
            // Jika tidak ada pengguna AdminOki yang terkait, tampilkan error
            return redirect()->route('super-admin.manajemen_kegiatan.index')->with('error', 'AdminOki terkait tidak ditemukan!');
        }
    }
    

    public function tolak($id)
    {
        // Pastikan hanya SuperAdmin yang dapat mengakses fungsi ini
        $this->authorizeAccess('SuperAdmin');
        
        // Mengambil data kegiatan berdasarkan ID
        $kegiatan = Manajemen::findOrFail($id);
        
        // Update status proposal menjadi 'ditolak'
        $kegiatan->update(['status_proposal' => 'ditolak']);
        
        // Mendapatkan data AdminOki yang terkait dengan DataOki dari kegiatan ini
        // Mengambil AdminOki berdasarkan relasi
        $adminOki = $kegiatan->dataOki->users()->where('role', 'AdminOki')->first();
    
        // Pastikan ada AdminOki yang terkait
        if ($adminOki) {
            // Ambil nomor HP dan nama lengkap dari AdminOki
            $nomorHp = $adminOki->no_hp;
            $namaLengkap = $adminOki->nama_lengkap;
    
            // Inisialisasi cURL untuk mengirimkan pesan
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',  // URL API Fonnte
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $nomorHp,  // Nomor HP AdminOki
                    'message' => 'Hallo ' . $namaLengkap . ', proposal kegiatan "' . $kegiatan->nama_kegiatan . '" telah ditolak. Mohon periksa kembali.',  // Pesan tentang status ditolak
                    'countryCode' => '62',
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: M8xs9bLniFSFLzZcU7nB'  // Token API Fonnte
                ),
            ));
    
            // Eksekusi cURL dan tangani respon
            $response = curl_exec($curl);
    
            // Cek jika ada error dalam cURL
            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
                // Jika ada error, tampilkan pesan error
                return response()->json(['error' => $error_msg], 500);
            }
    
            curl_close($curl);
        }
    
        // Redirect ke halaman index setelah update
        return redirect()->route('super-admin.manajemen_kegiatan.index')->with('success', 'Status proposal telah ditolak dan pesan telah dikirim!');
    }
    

    public function setujui($id)
{
    // Pastikan hanya SuperAdmin yang dapat mengakses fungsi ini
    $this->authorizeAccess('SuperAdmin');
    
    // Mengambil data kegiatan berdasarkan ID
    $kegiatan = Manajemen::findOrFail($id);
    
    // Update status proposal menjadi 'disetujui'
    $kegiatan->update(['status_proposal' => 'disetujui']);
    
    // Mendapatkan data AdminOki yang terkait dengan DataOki dari kegiatan ini
    // Mengambil AdminOki berdasarkan relasi
    $adminOki = $kegiatan->dataOki->users()->where('role', 'AdminOki')->first();

    // Pastikan ada AdminOki yang terkait
    if ($adminOki) {
        // Ambil nomor HP dan nama lengkap dari AdminOki
        $nomorHp = $adminOki->no_hp;
        $namaLengkap = $adminOki->nama_lengkap;

        // Inisialisasi cURL untuk mengirimkan pesan
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',  // URL API Fonnte
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $nomorHp,  // Nomor HP AdminOki
                'message' => 'Hallo ' . $namaLengkap . ', proposal kegiatan "' . $kegiatan->nama_kegiatan . '" telah disetujui. Terima kasih atas kontribusinya.',  // Pesan tentang status disetujui
                'countryCode' => '62',
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: M8xs9bLniFSFLzZcU7nB'  // Token API Fonnte
            ),
        ));

        // Eksekusi cURL dan tangani respon
        $response = curl_exec($curl);

        // Cek jika ada error dalam cURL
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            // Jika ada error, tampilkan pesan error
            return response()->json(['error' => $error_msg], 500);
        }

        curl_close($curl);
    }

    // Redirect ke halaman index setelah update
    return redirect()->route('super-admin.manajemen_kegiatan.index')->with('success', 'Status proposal telah disetujui dan pesan telah dikirim!');
}

}