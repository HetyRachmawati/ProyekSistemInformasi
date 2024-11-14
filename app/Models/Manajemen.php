<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manajemen extends Model
{
    use HasFactory;

    // Nama tabel dalam database
    protected $table = 'manajemenkegiatan';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_kegiatan',
        'id_oki',
        'tgl_kegiatan',
        'proposal_kegiatan',
        'status_proposal',
        'umpan_balik',
    ];

    /**
     * Relasi ke DataOki (tabel oki_baru).
     */
    public function dataOki()
    {
        return $this->belongsTo(DataOki::class, 'id_oki'); // Menghubungkan ke model DataOki
    }
}
