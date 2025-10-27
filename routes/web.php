<?php

use App\Http\Controllers\alumnoController;
use App\Http\Controllers\certificadoController;
use App\Http\Controllers\tipo_cursoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

    //ruta para tipo_curso
    Route::get('/tipo_cursos', [tipo_cursoController::class, 'index'])->name('tipo_cursos.index');
    Route::get('/tipo_cursos/create', [tipo_cursoController::class, 'create'])->name('tipo_cursos.create');
    Route::post('/tipo_cursos/store', [tipo_cursoController::class, 'store'])->name('tipo_cursos.store');
    Route::get('/tipo_cursos/edit/{id}', [tipo_cursoController::class, 'show'])->name('tipo_cursos.edit');
    Route::post('/tipo_cursos/update/{id}', [tipo_cursoController::class, 'update'])->name('tipo_cursos.update');
    Route::post('/tipo_cursos/destroy/{id}', [tipo_cursoController::class, 'destroy'])->name('tipo_cursos.destroy');
});

//ruta para alumno
Route::get('/alumnos', [alumnoController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos/create', [alumnoController::class, 'create'])->name('alumnos.create');
Route::post('/alumnos/store', [alumnoController::class, 'store'])->name('alumnos.store');
Route::get('/alumnos/edit/{id}', [alumnoController::class, 'show'])->name('alumnos.edit');
Route::post('/alumnos/update/{id}', [alumnoController::class, 'update'])->name('alumnos.update');
Route::post('/alumnos/destroy/{id}', [alumnoController::class, 'destroy'])->name('alumnos.destroy');

//
Route::get('/certificados', [certificadoController::class, 'index'])->name('certificados.index');
Route::get('/certificados/create', [certificadoController::class, 'create'])->name('certificados.create');
Route::post('/certificados/store', [certificadoController::class, 'store'])->name('certificados.store');
Route::get('/certificados/edit/{id}', [certificadoController::class, 'show'])->name('certificados.edit');
Route::post('/certificados/update/{id}', [certificadoController::class, 'update'])->name('certificados.update');
Route::post('/certificados/destroy/{id}', [certificadoController::class, 'destroy'])->name('certificados.destroy');