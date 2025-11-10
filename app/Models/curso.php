<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class curso extends Model
{
    protected $table = 'curso'; // o 'cursos' según tu BD

    protected $fillable = [
        'nombre_curso',
        'valor',
        'duracion_horas',
        'duracion_dias_presencial',
        'tipo_curso_id',
    ];
    public function tipoCurso()
    {
        return $this->belongsTo(tipo_curso::class, 'tipo_curso_id');
    }
}
