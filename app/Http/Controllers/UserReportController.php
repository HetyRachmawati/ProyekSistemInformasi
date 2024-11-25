<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use Illuminate\Http\Request;

class UserReportController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    
        if ($user->role === 'User') {
            $reports = Report::with(['manajemen', 'dataOki'])->paginate(10); 
            return view('report', compact('reports')); 
        }
    
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
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
