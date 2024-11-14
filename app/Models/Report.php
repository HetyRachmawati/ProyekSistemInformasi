<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report'; 
    
    protected $fillable = [
        'id_oki',
        'id_kegiatan',
        'manfaat',
        'hasil_pelaksanaan',
        'evaluasi',
        'saran',
        'tgl_pelaksanaan',
        'file_lpj',
        'status',
    ];

    protected $dates = ['tgl_pelaksanaan'];

    /**
     * Relasi ke model Manajemen (tabel manajemenkegiatan).
     */
    public function manajemen()
    {
        return $this->belongsTo(Manajemen::class, 'id_kegiatan', 'id'); 
    }

    /**
     * Relasi ke model DataOki (tabel oki_baru).
     */
    public function dataOki()
    {
        return $this->belongsTo(DataOki::class, 'id_oki'); 
    }
}
