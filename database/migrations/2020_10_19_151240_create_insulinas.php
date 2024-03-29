<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsulinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insulinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();

            $table->integer('inicio')->nullable();
            $table->integer('pico')->nullable();
            $table->integer('duracion')->nullable();
            $table->string('concentracion')->nullable();

            $table->enum('tipo', ['rapida', 'lenta']);
            $table->enum('estado', ['alegre','triste','enfadado','estresado','cansado','relajado']);
            $table->text('comentarios')->nullable();
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
        Schema::dropIfExists('insulinas');
    }
}
