<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'last_login', // ✅ hanya last_login saja
        'status',
        'role',
        'profile_picture',
    ];

    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->has($column) && $request->input($column) !== '') {
                $query->where($column, $request->input($column));
            }
        }

        return $query;
    }
}
