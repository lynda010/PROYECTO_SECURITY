<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    protected $fillable =[
        'fecha_pago',
        'monto',
        'metodo_pago',
        'estado_pago',
        'alumno_id',
        'curso_id'
    ];
    public function alumno()
    {
        return $this->belongsTo(alumno::class);
    }
    public function curso()
    {
        return $this->belongsTo(curso::class);
    }
    
}
