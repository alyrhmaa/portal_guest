<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;

class Berita extends Model
{
    use HasFactory;

    protected $table      = 'berita';
    protected $primaryKey = 'berita_id';

    protected $fillable = [
        'kategori_id',
        'judul',
        'slug',
        'isi_html',
        'penulis',
        'status',
        'terbit_at',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'berita_id')
            ->where('ref_table', 'berita')
            ->orderBy('sort_order');
    }
}
