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
        'curso_id'
        
    ];
    public function alumno()
    {
        return $this->belongsTo(alumno::class);
    }
    public function curso()
    {
        return $this->belongsTo(curso::class);
    }

}
