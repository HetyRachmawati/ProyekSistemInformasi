<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'nim',
        'email',
        'password',
        'role',
        'no_hp',
        'jabatan',
        'periode',
        'jurusan',
        'status_keaktifan',
        'id_oki',
        'id_divisi',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relationship with DataOki.
     */
    public function dataOki()
    {
        return $this->belongsTo(DataOki::class, 'id_oki');
    }

    /**
     * Relationship with DataDivisi.
     */
    public function dataDivisi()
    {
        return $this->belongsTo(DataDivisi::class, 'id_divisi');
    }
}
