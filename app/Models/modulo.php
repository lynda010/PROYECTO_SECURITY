<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class modulo extends Model
{
    protected $fillable = [
        'nombre_modulo',
        'curso_id'
    ];
    public function curso()
    {
        return $this->belongsTo(curso::class);
    }
}
