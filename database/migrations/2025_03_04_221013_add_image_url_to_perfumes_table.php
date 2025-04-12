<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('perfumes', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('description'); // Campo para la URL de la imagen
        });
    }

    public function down()
    {
        Schema::table('perfumes', function (Blueprint $table) {
            $table->dropColumn('image_url'); // Eliminar el campo si se revierte la migración
        });
    }
};
