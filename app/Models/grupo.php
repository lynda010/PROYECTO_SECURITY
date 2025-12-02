<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    // Nombre de la tabla 
    protected $table = 'grupos';

    // Campos asignables
    protected $fillable = ['nombre_grupo', 'descripcion'];




    public function alumno_completa_modulo()
    {
        return $this->hasMany(alumno_toma_curso::class);
    }

}
