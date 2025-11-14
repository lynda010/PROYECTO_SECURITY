<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso'; // Nombre correcto de tu tabla

    protected $fillable = [
        'nombre_curso',
        'valor',
        'duracion_horas',
        'duracion_dias_presencial',
        'tipo_curso_id',
    ];

    // 🔵 Relación con Tipo de Curso
    public function tipoCurso()
    {
        return $this->belongsTo(Tipo_Curso::class, 'tipo_curso_id');
    }

    // 🔵 Relación con Módulos
    public function modulos()
    {
        return $this->hasMany(Modulo::class, 'curso_id');
    }
    public function alumnos()
    {
        return $this->belongsToMany(
            Alumno::class,
            'alumno_toma_cursos',
            'id_curso',
            'id_alumno'
        )
            ->withPivot('fecha_inicio', 'fecha_fin', 'calificacion', 'aprobado')
            ->withTimestamps();
    }
}
