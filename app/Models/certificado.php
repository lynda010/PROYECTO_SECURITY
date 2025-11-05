<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificado extends Model
{
    
    protected $fillable = [
        'codigo_interno',
        'codigo_qr',
        'fecha_emision',
        'fecha_vencimiento',
        'resgistro_supervigilancia',
        'alumno_id'
    ];

    // Un certificado pertenece a un alumno
    public function alumno()
    {
        return $this->belongsTo(alumno::class, 'alumno_id');
    }
}
