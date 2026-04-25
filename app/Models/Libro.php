<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'descripcion',
        'user_id',
    ];

    public function valoraciones()
    {
        return $this->hasMany(Valoracion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
