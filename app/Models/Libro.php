<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'genero',
        'editorial',
        'fecha_publicacion',
        'isbn',
    ];

    protected $casts = [
        'fecha_publicacion' => 'date',
    ];
}
