<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesoPacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peso_pacientes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->integer('peso');
            $table->integer('imc')->nullable();
            $table->string('comentario')->nullable();
            $table->integer('altura');
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
        Schema::dropIfExists('peso_pacientes');
    }
}
