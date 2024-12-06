<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use Illuminate\Http\Request;

class UserReportController extends Controller
{
    public function index()
    {
        // Mengambil semua laporan tanpa login
        $reports = Report::with(['manajemen', 'dataOki'])->paginate(10);
    
        // Mengirim data ke view
        return view('report', compact('reports'));
    }
    
    public function show($id)
    {
        $user = Auth::user();
    
        $report = Report::findOrFail($id);
    
        if (!$report) {
            abort(404, 'Laporan tidak ditemukan.');
        }

        return view('report-show', compact('report'));
    }
        
}
