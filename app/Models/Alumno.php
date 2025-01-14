<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos'; // Especifica la tabla asociada

    protected $fillable = ['nombre', 'email']; // Campos que se pueden rellenar automáticamente

    // Relación 1:N con la tabla 'notas'
    public function notas()
    {
        return $this->hasMany(Nota::class, 'alumno_id'); // Un alumno puede tener muchas notas
    }

    // Relación N:N con 'Asignatura' a través de la tabla intermedia 'notas'
    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class, 'notas')
            ->withPivot('nota') // Incluye el campo extra 'nota' de la tabla intermedia
            ->withTimestamps(); // Incluye created_at y updated_at de la tabla intermedia
    }

    public function perfil()
    {
        return $this->hasOne(Perfil::class, 'usuario_id');
    }
}
