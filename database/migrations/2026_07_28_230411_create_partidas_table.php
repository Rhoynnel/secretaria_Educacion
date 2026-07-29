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
        Schema::create('nomina.partidas', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 10);
            $table->string('nombre', 200);
            $table->integer('id_tipo_nomina')->references('id')->on('nomina.tipo_nominas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomina.partidas');
    }
};
