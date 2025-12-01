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

}
