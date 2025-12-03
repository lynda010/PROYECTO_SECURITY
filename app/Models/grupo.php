<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;


    protected $table = 'grupos';


    protected $fillable = ['nombre_grupo', 'descripcion'];


    public function alumno_completa_modulo()
    {
        return $this->hasMany(alumno_toma_curso::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_toma_cursos', 'grupo_id', 'alumno_id');
    }
}
