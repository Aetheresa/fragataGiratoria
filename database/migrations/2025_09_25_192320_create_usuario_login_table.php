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
        Schema::table('usuario', function (Blueprint $table) {
            if (!Schema::hasColumn('usuario', 'id_rol')) {
                $table->unsignedBigInteger('id_rol')->after('password');

                // Definir la FK hacia la tabla rol
                $table->foreign('id_rol')
                      ->references('id_rol')
                      ->on('rol')
                      ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuario', function (Blueprint $table) {
            if (Schema::hasColumn('usuario', 'id_rol')) {
                $table->dropForeign(['id_rol']);
                $table->dropColumn('id_rol');
            }
        });
    }
};
