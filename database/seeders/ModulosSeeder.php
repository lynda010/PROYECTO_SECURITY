<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('modulos')->insert([
            [
                'nombre_modulo' => 'Manejo de Minutas',
                'curso_id' => 1,
            ],
            [
                'nombre_modulo' => 'Controles de Acceso',
                'curso_id' => 1,
            ],
            [
                'nombre_modulo' => 'Normativa sobre Armas (Decreto 2535 de 1993)',
                'curso_id' => 1,
            ],
            [
                'nombre_modulo' => 'Normativa de Empresas de Seguridad (Decreto 356 de 1994)',
                'curso_id' => 1,
            ],
            [
                'nombre_modulo' => 'Manejo de Emergencias y Control de Acceso',
                'curso_id' => 1,
            ],
            [
                'nombre_modulo' => 'Atención al Cliente',
                'curso_id' => 1,
            ],
        ]);
    }
}