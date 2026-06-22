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
        Schema::create('credencial.tipo_movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('tipo',1)->comment('N:Normal, T: Traslado');
            $table->timestamps();
        });

        Schema::create('credencial.movimientos_sustitucion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credencial.tipo_movimientos');
        Schema::dropIfExists('credencial.movimientos_sustitucion');
    }
};
