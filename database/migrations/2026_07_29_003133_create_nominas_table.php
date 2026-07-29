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
        Schema::create('nomina.nominas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200);
            $table->date('fecha_nomina');
            $table->integer('id_tipo_nomina')->references('id')->on('nomina.tipo_nominas');
            $table->enum('estatus', ['ABIERTA', 'CERRADA', 'PAGADA'])->default('ABIERTA');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomina.nominas');
    }
};
