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
        Schema::create('credencial.credencials', function (Blueprint $table) {
            $table->id();
            $table->integer('periodo_id');
            $table->integer('persona_id');
            $table->integer('tipo_movimiento_id');
            $table->integer('dependencia_id');
            $table->integer('cargo_id');
            $table->integer('motivo_sustitucion_id')->nullable();
            $table->integer('sustituto_id')->nullable();
            $table->integer('ner_id')->nullable();
            $table->string('observacion')->nullable();
            $table->string('observacion_sustitucion')->nullable();
            $table->date('fecha_movimiento');
            $table->date('fecha_efecto');
            $table->timestamps();

            $table->foreign('periodo_id')->references('id')->on('comun.periodos');
            $table->foreign('persona_id')->references('id')->on('personal.personas');
            $table->foreign('tipo_movimiento_id')->references('id')->on('credencial.tipo_movimientos');
            $table->foreign('dependencia_id')->references('id')->on('docente.dependencias');
            $table->foreign('cargo_id')->references('id')->on('docente.cargos');
            $table->unique(['id','periodo_id','persona_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credencial.credencials');
    }
};
