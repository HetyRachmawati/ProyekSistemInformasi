<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDivisi extends Model
{
    use HasFactory;

    // Nama tabel dalam database
    protected $table = 'divisi_baru'; 
    
    // Kolom yang dapat diisi secara massal
    protected $fillable = ['nama_divisi', 'id_oki'];

    /**
     * Relasi dengan model DataOki (tabel oki_baru).
     */
    public function dataOki()
    {
        return $this->belongsTo(DataOki::class, 'id_oki'); // Relasi ke model DataOki
    }

    /**
     * Relasi dengan model User (tabel users).
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id_divisi'); // Relasi ke model User
    }

    public function manajemen()
    {
        return $this->hasMany(Manajemen::class, 'id_divisi'); // Relasi ke model Manajemen
    }
}
