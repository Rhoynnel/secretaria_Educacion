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
        Schema::create('docente.cargos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',4)->unique();
            $table->string('nombre');
            $table->foreignId('categoria_id')->constrained('nomina.categorias')->onDelete('cascade');
            $table->foreignId('tipo_nomina_id')->constrained('nomina.tipo_nominas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente.cargos');
    }
};
