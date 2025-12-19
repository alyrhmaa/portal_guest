<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table      = 'kategori_berita';
    protected $primaryKey = 'kategori_id';

    public $timestamps    = false; // ⬅ FIX PALING PENTING
    public $incrementing  = true;
    protected $keyType    = 'int';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
    ];

    // RELASI
    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_id');
    }

    // FILTER
    public function scopeFilter($query, $request)
    {
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        return $query;
    }
}
