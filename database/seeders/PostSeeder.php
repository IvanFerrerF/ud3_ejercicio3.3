<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Alumno;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asegúrate de que existan alumnos
        $alumnos = Alumno::all();

        if ($alumnos->isEmpty()) {
            $this->command->info('No hay alumnos en la base de datos. Por favor, crea alumnos antes de ejecutar el seeder.');
            return;
        }

        // Genera 3 posts por cada alumno
        foreach ($alumnos as $alumno) {
            Post::create([
                'usuario_id' => $alumno->id,
                'titulo' => 'Primer post de ' . $alumno->nombre,
                'contenido' => 'Este es el contenido del primer post.',
            ]);

            Post::create([
                'usuario_id' => $alumno->id,
                'titulo' => 'Segundo post de ' . $alumno->nombre,
                'contenido' => 'Este es el contenido del segundo post.',
            ]);

            Post::create([
                'usuario_id' => $alumno->id,
                'titulo' => 'Tercer post de ' . $alumno->nombre,
                'contenido' => 'Este es el contenido del tercer post.',
            ]);
        }
    }
}
