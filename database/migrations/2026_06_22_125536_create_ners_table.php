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
    Schema::create('docente.ners', function (Blueprint $table) {
        $table->id();
        
        // 1. Primero defines físicamente las columnas
        $table->string('dependencia_codigo',4); // Asegúrate de que coincida el tipo con 'codigo' en dependencias
        $table->string('codigo',4)->unique();
        $table->string('nombre');
        
        // Si 'parroquia_id' es un ID incremental estándar, debe ser unsignedBigInteger o foreignId
        $table->unsignedBigInteger('parroquia_id')->nullable(); 

        // 2. Al final de la tabla, defines las llaves foráneas
        // NOTA: Si 'dependencias' está en otro esquema, ej: 'comun.dependencias' o 'docente.dependencias', agrégalo en el on()
        $table->foreign('dependencia_codigo')
              ->references('codigo')
              ->on('docente.dependencias') // Cambiar por 'esquema.dependencias' si no está en el público
              ->onDelete('cascade');

        $table->foreign('parroquia_id')
              ->references('id')
              ->on('comun.parroquias')
              ->onDelete('cascade');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente.ners');
    }
};
