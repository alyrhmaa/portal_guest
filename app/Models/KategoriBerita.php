<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita'; // nama tabel di database
    protected $primaryKey = 'kategori_id'; // kolom primary key

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
    ];
}
