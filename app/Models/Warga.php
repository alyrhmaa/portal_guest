<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table      = 'warga';
    protected $primaryKey = 'warga_id';

    protected $fillable = [
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email',
    ];
    public function scopeFilter($query, $request)
    {
        // Kalau request kosong → langsung return query
        if (! $request) {
            return $query;
        }

        // Jika $request adalah array
        if (is_array($request)) {
            $search = $request['search'] ?? null;

            // Jika Request Object
        } else {
            $search = $request->input('search');
        }

        // Jika tidak ada search → return data normal
        if (! $search) {
            return $query;
        }

        $search = strtolower($search);

        return $query->where(function ($q) use ($search) {
            $q->whereRaw('LOWER(nama) LIKE ?', ["%$search%"])
                ->orWhereRaw('LOWER(no_ktp) LIKE ?', ["%$search%"])
                ->orWhereRaw('LOWER(jenis_kelamin) LIKE ?', ["%$search%"]);
        });
    }
}
