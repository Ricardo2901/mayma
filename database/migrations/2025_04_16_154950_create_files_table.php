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
            $table->string('original_name');        // Nombre original del archivo
            $table->string('stored_name');          // Nombre con el que se guarda
            $table->string('path');                 // Ruta en storage o URL
            $table->string('mime_type')->nullable(); // Tipo MIME (ej: image/jpeg)
            $table->unsignedBigInteger('size');     // Tamaño en bytes
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
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
