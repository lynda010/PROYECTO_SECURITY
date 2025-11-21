<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulosSeeder extends Seeder
{
    
    public function run(): void
    {
        // Los 6 módulos que se repiten en cada curso
        $modulosBase = [
            [ 'nombre_modulo' => 'Manejo de Minutas' ],
            [ 'nombre_modulo' => 'Controles de Acceso' ],
            [ 'nombre_modulo' => 'Normativa sobre Armas (Decreto 2535 de 1993)' ],
            [ 'nombre_modulo' => 'Normativa de Empresas de Seguridad (Decreto 356 de 1994)' ],
            [ 'nombre_modulo' => 'Manejo de Emergencias y Control de Acceso' ],
            [ 'nombre_modulo' => 'Atención al Cliente' ],
        ];

        // Obtener todos los cursos ya insertados
        $cursos = DB::table('curso')->get();

        foreach ($cursos as $curso) {

            foreach ($modulosBase as $modulo) {

                DB::table('modulos')->insert([
                    'nombre_modulo' => $modulo['nombre_modulo'],
                    'curso_id'      => $curso->id,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }

        }
    }







}