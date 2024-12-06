<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori_template';

    protected $fillable = ['nama_kategori'];

    public function homes()
    {
        return $this->hasMany(Home::class, 'id_kategori', 'id');
    }
}
