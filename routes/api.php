<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Alumno;
use App\Models\Nota;
use App\Models\Asignatura;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\RelacionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Ruta para obtener todos los alumnos
Route::get('/alumnos', function () {
    return Alumno::all();
});

// Ruta para obtener todas las notas
Route::get('/notas', function () {
    return Nota::all();
});

// Ruta para obtener todas las asignaturas
Route::get('/asignaturas', function () {
    return Asignatura::all();
});

// Listar asignaturas de un alumno
Route::get('/alumnos/{id}/asignaturas', [AlumnoController::class, 'asignaturas']);

// Listar alumnos inscritos en una asignatura
Route::get('/asignaturas/{id}/alumnos', [AsignaturaController::class, 'alumnos']);

// Registra las rutas para el controlador
Route::apiResource('alumnos', AlumnoController::class);
Route::apiResource('notas', NotaController::class);
Route::apiResource('asignaturas', AsignaturaController::class);

Route::prefix('relacion')->group(function () {
    Route::get('/alumno/{id}', [RelacionController::class, 'getAsignaturasPorAlumno']);
    Route::get('/asignatura/{id}', [RelacionController::class, 'getAlumnosPorAsignatura']);
    Route::post('/', [RelacionController::class, 'store']);
    Route::put('/{id}', [RelacionController::class, 'update']);
    Route::delete('/{id}', [RelacionController::class, 'destroy']);
});
