<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\DataDivisi;
use App\Models\DataOki;
use App\Models\Jurusan;
use App\Models\Manajemen;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardOverview()
{
    $data = [
        'data_oki' => DataOki::count(),
        'data_divisi' => DataDivisi::count(),
        'reports' => Report::count(),
        'kegiatan' => Manajemen::count(),
        'anggota' => User::count(),
        'jurusan' => Jurusan::count(),
    ];
    $reports = Report::with(['manajemen', 'dataOki'])->get(); 

    return view('dashboard', compact('data', 'reports'));
}

}