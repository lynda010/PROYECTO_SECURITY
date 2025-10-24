<?php

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
