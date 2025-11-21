<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            [
                'nombre_curso' => 'Fundamentación Vigilancia',
                'valor' => 450000,
                'duracion_horas' => 100,
                'duracion_dias_presencial' => 8,
                'tipo_curso_id' => 1
            ],
            [
                'nombre_curso' => 'Fundamentación Escolta',
                'valor' => 450000,
                'duracion_horas' => 100,
                'duracion_dias_presencial' => 8,
                'tipo_curso_id' => 1
            ],
            [
                'nombre_curso' => 'Fundamentación Medios Tecnológicos',
                'valor' => 450000,
                'duracion_horas' => 100,
                'duracion_dias_presencial' => 8,
                'tipo_curso_id' => 1
            ],
            [
                'nombre_curso' => 'Fundamentación Manejador Canino',
                'valor' => 450000,
                'duracion_horas' => 100,
                'duracion_dias_presencial' => 8,
                'tipo_curso_id' => 1
            ],
            [
                'nombre_curso' => 'Reentrenamiento Vigilancia',
                'valor' => 100000,
                'duracion_horas' => 80,
                'duracion_dias_presencial' => 4,
                'tipo_curso_id' => 2
            ],
            [
                'nombre_curso' => 'Reentrenamiento Escolta',
                'valor' => 100000,
                'duracion_horas' => 80,
                'duracion_dias_presencial' => 4,
                'tipo_curso_id' => 2
            ],
            [
                'nombre_curso' => 'Reentrenamiento Medios Tecnológicos',
                'valor' => 100000,
                'duracion_horas' => 80,
                'duracion_dias_presencial' => 4,
                'tipo_curso_id' => 2
            ],
            [
                'nombre_curso' => 'Reentrenamiento Manejador Canino',
                'valor' => 100000,
                'duracion_horas' => 80,
                'duracion_dias_presencial' => 4,
                'tipo_curso_id' => 2
            ],
            [
                'nombre_curso' => 'Control de Acceso',
                'valor' => 100000,
                'duracion_horas' => 10,
                'duracion_dias_presencial' => 2,
                'tipo_curso_id' => 3
            ],
            [
                'nombre_curso' => 'Atención al Cliente',
                'valor' => 10000,
                'duracion_horas' => 15,
                'duracion_dias_presencial' => 2,
                'tipo_curso_id' => 3
            ],
            [
                'nombre_curso' => 'Primeros Auxilios',
                'valor' => 100000,
                'duracion_horas' => 15,
                'duracion_dias_presencial' => 2,
                'tipo_curso_id' => 3
            ],
            [
                'nombre_curso' => 'Seguro de Armas de Fuego',
                'valor' => 100000,
                'duracion_horas' => 10,
                'duracion_dias_presencial' => 2,
                'tipo_curso_id' => 3
            ],
            [
                'nombre_curso' => 'Ejercicio Práctico de Tiro en Polígono',
                'valor' => 100000,
                'duracion_horas' => 10,
                'duracion_dias_presencial' => 2,
                'tipo_curso_id' => 3
            ],
            [
                'nombre_curso' => 'Defensa Personal',
                'valor' => 100000,
                'duracion_horas' => 10,
                'duracion_dias_presencial' => 3,
                'tipo_curso_id' => 3
            ],
            [
                'nombre_curso' => 'Nuevo Código de Policía',
                'valor' => 100000,
                'duracion_horas' => 10,
                'duracion_dias_presencial' => 2,
                'tipo_curso_id' => 3
            ],
            [
                'nombre_curso' => 'Manejo Garrett',
                'valor' => 100000,
                'duracion_horas' => 15,
                'duracion_dias_presencial' => 3,
                'tipo_curso_id' => 3
            ],
            [
                'nombre_curso' => 'Análisis de Riesgos',
                'valor' => 100000,
                'duracion_horas' => 10,
                'duracion_dias_presencial' => 2,
                'tipo_curso_id' => 3
            ],
        ];

        DB::table('curso')->insert($datos);
    }
    
}
