<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOki extends Model
{
    use HasFactory;

    // Nama tabel dalam database
    protected $table = 'oki_baru'; 
    
    protected $fillable = ['nama_oki'];

    /**
     * Relasi dengan model User (tabel users).
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id_oki'); 
    }

    /**
     * Relasi dengan model Manajemen (tabel manajemenkegiatan).
     */
    public function manajemen()
    {
        return $this->hasMany(Manajemen::class, 'id_oki'); 
    }

    /**
     * Relasi dengan model Report.
     */
    public function reports()
    {
        return $this->hasMany(Report::class, 'id_oki'); 
    }

    /**
     * Relasi dengan model DataDivisi (tabel divisi_baru).
     */
    public function dataDivisi()
    {
        return $this->hasMany(DataDivisi::class, 'id_oki'); 
    }
}


