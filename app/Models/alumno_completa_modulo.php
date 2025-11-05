<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alumno_completa_modulo extends Model
{
    protected $fillable = [
        'fecha_finalizacion',
        'estado',
        'alumno_id',
        'modulo_id'
    ];
    public function alumno()
    {
        return $this->belongsTo(alumno::class);
    }
    public function modulo()
    {
        return $this->belongsTo(modulo::class);
}
}
