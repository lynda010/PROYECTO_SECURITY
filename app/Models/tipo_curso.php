<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Curso extends Model
{
    protected $table = 'tipo_curso'; // usa minúsculas, como en la migración

    protected $fillable = ['nombre_tipo']; // <-- CORRECTO

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'tipo_curso_id');
    }
}
