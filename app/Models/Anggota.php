<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Nama tabel dalam database
    protected $table = 'anggota'; 
    
    // Primary key dari tabel
    protected $primaryKey = 'id_anggota'; 
    
    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'nim',
        'id_oki',
        'id_divisi',
        'email',
        'password',
        'no_hp',
        'jabatan',
        'periode',
        'jurusan',
        'status_keaktifan',
    ];

    /**
     * Relasi ke DataOki (tabel oki_baru).
     */
    public function dataOki()
    {
        return $this->belongsTo(DataOki::class, 'id_oki'); // Menghubungkan ke model DataOki
    }

    /**
     * Relasi ke DataDivisi (tabel divisi_baru).
     */
    public function dataDivisi()
    {
        return $this->belongsTo(DataDivisi::class, 'id_divisi'); // Menghubungkan ke model DataDivisi
    }
}
