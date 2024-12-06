<?php

namespace App\Models;

use App\Http\Controllers\KategoriController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $table = 'template';

    protected $fillable = [
        'judul',
        'deskripsi',
        'id_kategori',
        'gambar',
        'link_template',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}
