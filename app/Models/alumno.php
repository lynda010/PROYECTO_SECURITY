<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    // Nombre exacto de la tabla en la base de datos
    protected $table = 'alumno';

    // Nombre de la clave primaria
    protected $primaryKey = 'id';

    // Indica que la tabla tiene columnas created_at y updated_at
    public $timestamps = true;

    // Campos que se pueden llenar de forma masiva
    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'genero',
        'eps',
        'correo_electronico',
        'telefono',
        'direccion',
        'usuario_plataforma',
        'contrasena_plataforma',
        'situacion_militar_definida'
    ];



    public function certificados()
    {
        return $this->hasMany(Certificado::class, 'alumno_id');
    }



    public function pagos()
    {
        return $this->hasMany(pago::class, 'alumno_id');
    }


    public function cursos()
{
    return $this->belongsToMany(Curso::class, 'alumno_toma_cursos', 'alumno_id', 'curso_id')
                ->withPivot('fecha_inicio','fecha_fin','calificacion','aprobado')
                ->withTimestamps();
}


public function modulosCompletados()
    {
        return $this->belongsToMany(modulo::class, 'alumno_completa_modulo', 'id_alumno', 'id_modulo')
            ->withPivot('fecha_finalizacion', 'estado')
            ->withTimestamps();
    }



}
