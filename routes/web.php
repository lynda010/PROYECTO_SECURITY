<?php

use App\Http\Controllers\alumno_completa_moduloController;
use App\Http\Controllers\alumno_toma_cursoController;
use App\Http\Controllers\alumnoController;
use App\Http\Controllers\certificadoController;
use App\Http\Controllers\cursoController;
use App\Http\Controllers\modeloController;
use App\Http\Controllers\moduloController;
use App\Http\Controllers\pagoController;
use App\Http\Controllers\Tipo_CursoController;
use App\Http\Controllers\TipoCursoController;
use App\Models\modulo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para tipo_curso
Route::get('/tipo_cursos', [Tipo_CursoController::class, 'index'])->name('tipo_cursos.index');
Route::get('/tipo_cursos/create', [Tipo_CursoController::class, 'create'])->name('tipo_cursos.create');
Route::post('/tipo_cursos/store', [Tipo_CursoController::class, 'store'])->name('tipo_cursos.store');
Route::get('/tipo_cursos/edit/{id}', [Tipo_CursoController::class, 'edit'])->name('tipo_cursos.edit');
Route::post('/tipo_cursos/update/{id}', [Tipo_CursoController::class, 'update'])->name('tipo_cursos.update');
Route::post('/tipo_cursos/destroy/{id}', [Tipo_CursoController::class, 'destroy'])->name('tipo_cursos.destroy');



//ruta para alumno
Route::get('/alumnos', [alumnoController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos/create', [alumnoController::class, 'create'])->name('alumnos.create');
Route::post('/alumnos/store', [alumnoController::class, 'store'])->name('alumnos.store');
Route::get('/alumnos/edit/{id}', [alumnoController::class, 'edit'])->name('alumnos.edit');
Route::post('/alumnos/update/{id}', [alumnoController::class, 'update'])->name('alumnos.update');
Route::post('/alumnos/destroy/{id}', [alumnoController::class, 'destroy'])->name('alumnos.destroy');
Route::get('/alumnos/{id}/detalle', [AlumnoController::class, 'detalle'])->name('alumnos.detalle');

//rutas certificados
Route::get('/certificados', [CertificadoController::class, 'index'])->name('certificados.index');
Route::get('/certificados/create', [CertificadoController::class, 'create'])->name('certificados.create');
Route::post('/certificados/store', [CertificadoController::class, 'store'])->name('certificados.store');
Route::get('/certificados/edit/{codigo_interno}', [CertificadoController::class, 'edit'])->name('certificados.edit');
Route::post('/certificados/update/{codigo_interno}', [CertificadoController::class, 'update'])->name('certificados.update');
Route::post('/certificados/destroy/{codigo_interno}', [CertificadoController::class, 'destroy'])->name('certificados.destroy');


//rutas cursos
Route::get('/cursos', [cursoController::class, 'index'])->name('cursos.index');
Route::get('/cursos/create', [cursoController::class, 'create'])->name('cursos.create');
Route::post('/cursos/store', [cursoController::class, 'store'])->name('cursos.store');
Route::get('/cursos/edit/{id}', [cursoController::class, 'edit'])->name('cursos.edit');
Route::post('/cursos/update/{id}', [cursoController::class, 'update'])->name('cursos.update');
Route::post('/cursos/destroy/{id}', [cursoController::class, 'destroy'])->name('cursos.destroy');

//ruta modulo
Route::get('/modulos', [moduloController::class, 'index'])->name('modulos.index');
Route::get('/modulos/create', [moduloController::class, 'create'])->name('modulos.create');
Route::post('/modulos/store', [moduloController::class, 'store'])->name('modulos.store');
Route::get('/modulos/edit/{id}', [moduloController::class, 'edit'])->name('modulos.edit');
Route::post('/modulos/update/{id}', [moduloController::class, 'update'])->name('modulos.update');
Route::post('/modulos/destroy/{id}', [moduloController::class, 'destroy'])->name('modulos.destroy');

//rutas alumno_completa_modulo
Route::get('/alumno_completa_modulos', [alumno_completa_moduloController::class, 'index'])->name('alumno_completa_modulos.index');
Route::get('/alumno_completa_modulos/create', [alumno_completa_moduloController::class, 'create'])->name('alumno_completa_modulos.create');
Route::post('/alumno_completa_modulos/store', [alumno_completa_moduloController::class, 'store'])->name('alumno_completa_modulos.store');
Route::get('/alumno_completa_modulos/edit/{id}', [alumno_completa_moduloController::class, 'edit'])->name('alumno_completa_modulos.edit');
Route::post('/alumno_completa_modulos/update/{id}', [alumno_completa_moduloController::class, 'update'])->name('alumno_completa_modulo.update');
Route::post('/alumno_completa_modulos/destroy/{id}', [alumno_completa_moduloController::class, 'destroy'])->name('alumno_completa_modulos.destroy');
Route::get('/alumno_completa_modulos/createMasivo', [alumno_completa_moduloController::class, 'createMasivo'])->name('alumno_completa_modulos.createMasivo');
Route::post('/alumno_completa_modulos/storeMasivo', [alumno_completa_moduloController::class, 'storeMasivo'])->name('alumno_completa_modulos.storeMasivo');





//rutas pago
Route::get('/pagos', [pagoController::class, 'index'])->name('pagos.index');
Route::get('/pagos/create', [pagoController::class, 'create'])->name('pagos.create');
Route::post('/pagos/store', [pagoController::class, 'store'])->name('pagos.store');
Route::get('pagos/edit/{id}', [pagoController::class, 'edit'])->name('pagos.edit');
Route::post('/pagos/updte/{id}', [pagoController::class, 'update'])->name('pagos.update');
Route::post('/pagos/destroy/{id}', [pagoController::class, 'destroy'])->name('pagos.destroy');

//rutas alumno_toma_curso
Route::get('/alumno_toma_cursos', [alumno_toma_cursoController::class, 'index'])->name('alumno_toma_cursos.index');
Route::get('/alumno_toma_cursos/create', [alumno_toma_cursoController::class, 'create'])->name('alumno_toma_cursos.create');
Route::post('/alumno_toma_cursos/store', [alumno_toma_cursoController::class, 'store'])->name('alumno_toma_cursos.store');
Route::get('/alumno_toma_cursos/edit/{id}', [alumno_toma_cursoController::class, 'edit'])->name('alumno_toma_cursos.edit');
Route::post('/alumno_toma_cursos/update/{id}', [alumno_toma_cursoController::class, 'update'])->name('alumno_toma_cursos.update');
Route::post('/alumno_toma_cursos/destroy/{id}', [alumno_toma_cursoController::class, 'destroy'])->name('alumno_toma_cursos.destroy');
Route::get('/alumno_toma_cursos/masivo', [alumno_toma_cursoController::class, 'createMasivo'])->name('alumno_toma_cursos.create.masivo');
Route::post('/alumno_toma_cursos/storemasivo', [alumno_toma_cursoController::class, 'storeMasivo'])->name('alumno_toma_cursos.storemasivo');

//ruta ver pdf

// Ver PDF de alumnos
Route::get('/alumnospdf', [alumnoController::class, 'verpdfalumnos'])->name('alumnos.pdf');


Route::get('/alumnos/pdf', [AlumnoController::class, 'generarPDF'])->name('alumnos.pdf');
