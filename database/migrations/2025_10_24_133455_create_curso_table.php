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
        Schema::create('curso', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_curso', 100);
            $table->decimal('valor', 10, 2);
            $table->integer('duracion_horas');
            $table->integer('duracion_dias_presencial');
            $table->unsignedBigInteger('tipo_curso_id');
            $table->foreign('tipo_curso_id')->references('id')->on('tipo_curso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso');
    }
};
