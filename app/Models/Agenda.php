<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $primaryKey = 'agenda_id';
    protected $table      = 'agenda';

    protected $fillable = [
        'judul',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'penyelenggara',
        'deskripsi',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
    ];
    public function media()
    {
        return $this->hasMany(
            Media::class,
            'ref_id', 
            'agenda_id'
        )->where('ref_table', 'agenda');
    }

}
