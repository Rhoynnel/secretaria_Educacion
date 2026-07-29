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
        Schema::create('docente.docentes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_persona')->references('id')->on('personal.personas');
            $table->integer('id_cargo')->references('id')->on('docente.cargos');
            $table->integer('id_dependencia')->references('id')->on('personal.dependencias');
            $table->date('fecha_ingreso');
            $table->integer('id_banco')->references('id')->on('comun.bancos');
            $table->string('cuenta_bancaria', 20);
            $table->date('fecha_nomina');
            $table->integer('id_tipo_nomina')->references('id')->on('nomina.tipo_nominas');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente.docentes');
    }
};
