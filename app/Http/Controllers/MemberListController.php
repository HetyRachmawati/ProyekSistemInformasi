<?php

namespace App\Http\Controllers;

use App\Models\Anggota; // Pastikan menggunakan model Anggota
use Illuminate\Http\Request;

class MemberListController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::all(); 

        return view('memberlist', compact('anggotas'));
    }
}
