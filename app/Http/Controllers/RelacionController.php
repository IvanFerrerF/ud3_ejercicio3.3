<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class RelacionController extends Controller
{
    public function getAsignaturasPorAlumno($id)
    {
        $notas = Nota::where('alumno_id', $id)->with('asignatura')->get();
        return response()->json($notas);
    }

    public function getAlumnosPorAsignatura($id)
    {
        $notas = Nota::where('asignatura_id', $id)->with('alumno')->get();
        return response()->json($notas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'asignatura_id' => 'required|exists:asignaturas,id',
            'nota' => 'required|numeric|min:0|max:10',
        ]);

        $nota = Nota::create($request->all());
        return response()->json($nota, 201);
    }

    public function update(Request $request, $id)
    {
        // Encuentra la relación en la tabla intermedia por ID
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Relación no encontrada'], 404);
        }

        // Validar los datos
        $validated = $request->validate([
            'nota' => 'required|numeric|min:0|max:10', // Solo permite actualizar el campo 'nota'
        ]);

        // Actualizar los datos
        $nota->update($validated);

        return response()->json([
            'message' => 'Relación actualizada con éxito',
            'data' => $nota,
        ]);
    }


    public function destroy($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['error' => 'Relación no encontrada'], 404);
        }

        $nota->delete();
        return response()->json(['message' => 'Relación eliminada correctamente']);
    }
}
