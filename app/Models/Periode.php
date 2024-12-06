<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $table = 'periode';
    protected $fillable = ['tahun_periode'];

    // Relasi dengan model User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
