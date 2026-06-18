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
        Schema::create('nomina.tipo_nominas', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->unique();
            $table->string('nombre')->unique();
            $table->boolean('status')->default(true);
            $table->string('abreviatura', 2)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomina.tipo_nominas');
    }
};
