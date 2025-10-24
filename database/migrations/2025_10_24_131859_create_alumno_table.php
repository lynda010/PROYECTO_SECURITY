<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento', 20);
            $table->string('numero_documento', 50)->unique();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->date('fecha_nacimiento');
            $table->string('genero', 20);
            $table->string('eps', 150);
            $table->string('correo_electronico', 100)->unique();
            $table->string('telefono', 20);
            $table->string('direccion', 255);
            $table->string('usuario_plataforma', 50);
            $table->string('contrasena_plataforma', 50);
            $table->boolean('situacion_militar_definida');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno');
    }
};
