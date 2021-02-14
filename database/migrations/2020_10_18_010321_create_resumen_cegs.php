<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumenCegs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Comidas - Ejercicios - Glucometrías
        Schema::create('resumen_cegs', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->enum('tipo', ['desayuno', 'almuerzo', 'comida', 'refrigerio']);
            $table->enum('tipo_hora', ['antes', 'despues']);

            $table->time('hora')->nullable();
            $table->integer('tiempo_ejercicio')->nullable();
            $table->enum('tipo_ejercicio', ['bajo', 'medio', 'alto'])->nullable();
            $table->integer('valor_glucometria')->nullable();
            $table->enum('categoria', ['glucometria', 'ejercicio', 'comida']);
            $table->string('descripcion')->nullable();

            $table->foreignId('informacion_user_id')->references('id')->on('informacion_users')->onDelete('cascade')->comment('REFERENCIA HACIA PACIENTES');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumen_cegs');
    }
}
