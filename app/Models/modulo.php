<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulos';

    protected $fillable = ['nombre_modulo', 'curso_id'];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
