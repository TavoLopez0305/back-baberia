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
        Schema::create('citas', function (Blueprint $table) {
            $table->id(); // PK técnica

            // ID de negocio (folio)
            $table->string('id_cita', 50)->unique();

            // Relaciones principales
            $table->foreignId('id_cliente')
                ->constrained('clientes')
                ->onDelete('restrict');

            $table->foreignId('id_sucursal')
                ->constrained('sucursales')
                ->onDelete('restrict');

            // Auto-relación para reagendado
            $table->foreignId('id_cita_reagendada')
                ->nullable()
                ->constrained('citas')
                ->nullOnDelete();

            // Datos de la cita
            $table->dateTime('fecha_hora');
            $table->string('estado', 20)->default('programada');
            $table->dateTime('fecha_hora_reagenda')->nullable();
            $table->text('notas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
