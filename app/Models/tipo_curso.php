<?php

namespace App\Models;
use App\Models\curso;

use Illuminate\Database\Eloquent\Model;

class tipo_curso extends Model
{
    protected $fillable =['tipo_curso'];

    public function cursos()
    {
        return $this->hasMany(curso::class, 'tipo_curso_id');
    } 
}
