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
        Schema::create('nomina.conceptos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 3);
            $table->string('nombre', 200);
            $table->integer('id_tipo_concepto');
            $table->integer('id_partida')->references('id')->on('nomina.partidas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomina.conceptos');
    }
};
