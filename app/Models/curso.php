<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'curso'; // Nombre exacto de la tabla

    protected $fillable = [
        'nombre_curso',
        'valor',
        'duracion_horas',
        'duracion_dias_presencial',
        'tipo_curso_id',
    ];

    /**
     * Relación con el tipo de curso.
     * Un curso pertenece a un tipo.
     */
    public function tipoCurso()
    {
        return $this->belongsTo(Tipo_Curso::class, 'tipo_curso_id');
    }

    /**
     * Relación con los módulos del curso.
     * Un curso tiene muchos módulos.
     */
    public function modulos()
    {
        return $this->hasMany(Modulo::class, 'curso_id');
    }

    
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_toma_cursos', 'curso_id', 'alumno_id')
            ->withPivot('fecha_inicio', 'fecha_fin', 'calificacion', 'aprobado');
    }
}
