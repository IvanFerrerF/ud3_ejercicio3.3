<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles'; // Especifica la tabla asociada

    protected $fillable = ['usuario_id', 'biografia']; // Campos rellenables

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'usuario_id'); // Relación inversa 1:1
    }
}
