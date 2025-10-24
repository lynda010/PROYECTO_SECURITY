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
        Schema::create('certificado', function (Blueprint $table) {
            $table->string('codigo_interno', 50)->primary();
            $table->string('codigo_qr', 50);
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento');
            $table->string('resgistro_supervigilancia',100);
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumno');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificado');
    }
};
