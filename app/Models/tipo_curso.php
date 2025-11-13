<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tipo_Curso extends Model
{
    use HasFactory;

    protected $table = 'tipo_curso'; // usa minúsculas, como en la migración

    protected $fillable = ['nombre_tipo']; // <-- CORRECTO

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'tipo_curso_id');
    }
}
