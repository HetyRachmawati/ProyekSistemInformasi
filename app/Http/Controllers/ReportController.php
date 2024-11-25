<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Manajemen;
use App\Models\DataOki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
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
            $reports = Report::with(['manajemen', 'dataOki'])->paginate(10); 
            return view('super-admin.report.index', compact('reports'));
        }        
    
        if ($user->role === 'AdminOki') {
            $reports = Report::with(['manajemen', 'dataOki'])->paginate(10); 
            return view('admin-oki.report.index', compact('reports'));
        }
    
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
    
    public function show($id)
    {
        $user = Auth::user();
    
        $report = Report::findOrFail($id);
    
        if ($user->role === 'SuperAdmin') {
            return view('super-admin.report.show', compact('report'));
        }
    
        if ($user->role === 'AdminOki') {
            return view('admin-oki.report.show', compact('report'));
        }
    
    }

    
    public function create()
    {
        $this->authorizeAccess('AdminOki');  
            $manajemenKegiatan = Manajemen::all(); 
            $dataOki = DataOki::all();  
    
        return view('admin-oki.report.create', compact('manajemenKegiatan', 'dataOki'));
    }
    

    public function store(Request $request)
    {
        $this->authorizeAccess('AdminOki');  
    
        $request->validate([
            'id_kegiatan' => 'required|exists:manajemenkegiatan,id',
            'manfaat' => 'required',
            'hasil_pelaksanaan' => 'nullable',
            'evaluasi' => 'nullable',
            'saran' => 'nullable',
            'file_lpj' => 'nullable|file|mimes:pdf|max:10240',
            'status' => 'required|in:belum selesai,selesai', 
            'tgl_pelaksanaan' => 'required|date',
        ]);
    
        if ($request->hasFile('file_lpj')) {
            $filePath = $request->file('file_lpj')->storeAs('lpj', uniqid() . '.' . $request->file('file_lpj')->getClientOriginalExtension(), 'public');
        } else {
            $filePath = null;
        }
    
        Report::create([
            'id_oki' =>  $request->id_oki,  
            'id_kegiatan' => $request->id_kegiatan,
            'manfaat' => $request->manfaat,
            'hasil_pelaksanaan' => $request->hasil_pelaksanaan,
            'evaluasi' => $request->evaluasi,
            'saran' => $request->saran,
            'file_lpj' => $filePath,
            'status' => $request->status,  
            'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
        ]);
    
        return redirect()->route('admin-oki.report.index')->with('success', 'Laporan berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $this->authorizeAccess('AdminOki');  
    
        $report = Report::findOrFail($id);
    
        $dataOki = DataOki::all();
        // if ($report->id_oki != Auth::user()->id_oki) {
        //     abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        // }
    
        $manajemenKegiatan = Manajemen::all();
        return view('admin-oki.report.edit', compact('report', 'manajemenKegiatan','dataOki'));
    }
    
    public function update(Request $request, $id)
    {
        $this->authorizeAccess('AdminOki');  
    
        $report = Report::findOrFail($id);
    
        // if ($report->id_oki != Auth::user()->id_oki) {
        //     abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        // }
        $request->validate([
            'id_kegiatan' => 'required|exists:manajemenkegiatan,id',
            'manfaat' => 'nullable|string',
            'hasil_pelaksanaan' => 'nullable|string',
            'evaluasi' => 'nullable|string',
            'saran' => 'nullable|string',
            'tgl_pelaksanaan' => 'nullable|date',
            'file_lpj' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'status' => 'nullable|in:belum selesai,selesai',
            'id_oki' => 'required|exists:users,id',  
        ]);
    
        $report->update($request->except('id_oki'));
    
        if ($request->hasFile('file_lpj')) {
            $filePath = $request->file('file_lpj')->store('lpj_files', 'public');
            $report->file_lpj = $filePath;
            $report->save();
        }
    
        return redirect()->route('admin-oki.report.index');
    }
    
   
    public function destroy($id)
    {
        $this->authorizeAccess('AdminOki');  

        $report = Report::findOrFail($id);

        if ($report->id_oki != Auth::user()->id_oki) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        $report->delete();
        return redirect()->route('admin-oki.report.index');
    }
    
}
