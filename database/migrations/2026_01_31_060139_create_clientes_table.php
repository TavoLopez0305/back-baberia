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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // PK técnica

            // ID de negocio
            $table->string('id_cliente', 50)->unique();

            // Datos del cliente
            $table->string('nombre', 100);
            $table->string('apellido', 100)->nullable();

            $table->string('correo', 100)->nullable()->unique();
            $table->string('telefono', 20);

            $table->text('notas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
