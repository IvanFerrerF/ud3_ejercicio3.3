<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'titulo', 'contenido'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'usuario_id');
    }
}

