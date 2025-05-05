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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');        // Nombre original del archivo
            $table->string('path');        // Ruta del archivo en el servidor
            $table->string('format')->nullable();      // Formato del archivo (opcional)
            $table->string('size');       // Tamaño del archivo en MB
            $table->string('username') -> nullable(); // ID del usuario (opcional)
            $table->string('nameuser'); // Nombre del usuario (opcional)
            $table->string('user_email') -> nullable(); // ID del usuario (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
