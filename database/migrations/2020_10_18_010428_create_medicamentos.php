<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cantidad');
            $table->enum('administracion', ['oral', 'tópica', 'transdérmica', 'oftálmica', 'ótica', 'intranasal', 'inhalatoria', 'intravenosa', 'intramuscular', 'subcutánea']);
            $table->string('especialidad')->nullable();
            $table->integer('horario')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->enum('estado', ['activo', 'inactivo']);
            $table->string('comentario')->nullable();            
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
        Schema::dropIfExists('medicamentos');
    }
}
