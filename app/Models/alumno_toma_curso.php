<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alumno_toma_curso extends Model
{
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'calificacion',
        'aprobado',
        'alumno_id',
        'curso_id',
        'grupo_id'
        
    ];

    public function alumno()
    {
        return $this->belongsTo(alumno::class,'alumno_id');
    }

    public function curso()
    {
        return $this->belongsTo(curso::class,'curso_id');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class,'grupo_id');
    }



}
