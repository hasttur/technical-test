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
        Schema::create('puntos_gps', function (Blueprint $table) {
            $table->id();

            $table->string("dispositivo");
            $table->text("imei");
            $table->datetime("tiempo");
            $table->text("placa");
            $table->text("version");
            $table->integer("longitud");
            $table->integer("latitud");
            $table->datetime("fecha_recepcion");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntos_gps');
    }
};
