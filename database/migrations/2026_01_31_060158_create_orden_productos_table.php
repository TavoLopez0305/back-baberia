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
        Schema::create('orden_productos', function (Blueprint $table) {
            $table->id();
            // Relaciones
            $table->foreignId('id_orden')
                  ->constrained('ordenes')
                  ->onDelete('cascade');

            $table->foreignId('id_producto')
                  ->constrained('productos')
                  ->onDelete('restrict');

            // Snapshot del producto
            $table->string('nombre_producto', 150);
            $table->decimal('precio', 10, 2);
            $table->integer('cantidad')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_productos');
    }
};
