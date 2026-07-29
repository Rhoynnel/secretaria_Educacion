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
        Schema::create('nomina.nomina__movimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_nomina')->references('id')->on('nomina.nominas');
            $table->integer('id_docente')->references('id')->on('docente.docentes');
            $table->integer('id_concepto')->references('id')->on('nomina.conceptos');
            $table->integer('id_categoria')->references('id')->on('nomina.categorias');
            $table->integer('id_nivel')->references('id')->on('nomina.niveles');
            $table->decimal('monto', 10, 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomina.nomina__movimientos');
    }
};
