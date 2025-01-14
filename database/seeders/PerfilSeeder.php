<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perfiles')->insertOrIgnore([
            [
                'usuario_id' => 1, // Relacionado con el alumno con id = 1
                'biografia' => 'Soy Juan Pérez, apasionado por el aprendizaje.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 2, // Relacionado con el alumno con id = 2
                'biografia' => 'María González, con interés en matemáticas avanzadas.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 3, // Relacionado con el alumno con id = 3
                'biografia' => 'Carlos López, entusiasta del desarrollo de software.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
