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
        Schema::create('nomina__egresos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_nomina')->references('id')->on('nomina.nominas');
            $table->integer('id_docente')->references('id')->on('docente.docentes');
            $table->date('fecha_egreso');
            $table->integer('motivo_egreso')->references('id')->on('nomina.motivo_egresos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomina__egresos');
    }
};
