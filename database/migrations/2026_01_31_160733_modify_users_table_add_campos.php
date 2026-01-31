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
        Schema::table('users', function (Blueprint $table) {

            $table->string('id_user',50)->unique()->after('id');
            // FK a roles
            $table->foreignId('id_rol')
                  ->after('id')
                  ->constrained('roles')
                  ->onDelete('restrict');

            // Campo activo
            $table->boolean('activo')
                  ->default(true)
                  ->after('password');

            // Opcional: renombrar name → nombre
            $table->renameColumn('name', 'nombre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Revertir nombre
            $table->renameColumn('nombre', 'name');         

            // Eliminar FK y columnas
            $table->dropForeign(['id_rol']);
            $table->dropColumn('id_rol');
            $table->dropColumn('activo');
            $table->dropColumn('id_user');

        });
   }
};
