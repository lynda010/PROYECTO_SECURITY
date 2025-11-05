<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $fillable = [
        'nombre_curso',
        'valor',
        'duracion_horas',
        'duracion_dias_presencial'
    ];

    // Un curso pertenece a un tipo de curso
    public function tipoCurso()
    {
        return $this->belongsTo(tipo_curso::class, 'tipo_curso_id');
    }
}
