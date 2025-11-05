<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;

    
    protected $table = 'certificado';

    
    protected $primaryKey = 'codigo_interno';
    public $incrementing = false; // porque es string, no autoincremental
    protected $keyType = 'string';

    // 👇 Campos permitidos para asignación masiva
    protected $fillable = [
        'codigo_interno',
        'codigo_qr',
        'fecha_emision',
        'fecha_vencimiento',
        'resgistro_supervigilancia',
        'alumno_id'
    ];

    // 👇 Relación: un certificado pertenece a un alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}
