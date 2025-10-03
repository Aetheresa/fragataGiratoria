<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('usuario', function (Blueprint $table) {
            // Agregamos el campo 'rol' como texto (varchar 50)
            $table->string('rol', 50)->default('Usuario')->after('email');
        });
    }

    public function down()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->dropColumn('rol');
        });
    }
};

