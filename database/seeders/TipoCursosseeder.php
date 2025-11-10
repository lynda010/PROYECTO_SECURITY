<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $datos = [
            [
                'nombre_tipo' => 'Fundamentación'
            ],

            [
                'nombre_tipo' => 'Reentrenamiento'
            ],

            [
                'nombre_tipo' => 'Seminarios'
            ],

        ];



        DB::table('tipo_curso')->insert($datos);


    }
}