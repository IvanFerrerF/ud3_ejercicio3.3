<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;

class PerfilController extends Controller
{
    public function index()
    {
        // Obtener todos los perfiles
        return Perfil::all();
    }

    public function show($id)
    {
        // Mostrar un perfil específico
        return Perfil::findOrFail($id);
    }

    public function store(Request $request)
    {
        // Crear un nuevo perfil
        $perfil = Perfil::create($request->all());
        return response()->json($perfil, 201);
    }

    public function update(Request $request, $id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->update($request->all());

        return response()->json([
            'mensaje' => 'Perfil actualizado correctamente',
            'perfil' => $perfil
        ], 200);
    }


    public function destroy($id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->delete();

        return response()->json([
            'mensaje' => 'Perfil eliminado correctamente'
        ], 200);
    }
}
