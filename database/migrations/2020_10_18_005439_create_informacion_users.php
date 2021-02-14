<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_users', function (Blueprint $table) {
            $table->id();
            // $table->string('nombre')->nullable();
            $table->string('apellidos')->nullable();
            $table->enum('tipo_documento', ['TI','CC','RC'])->nullable();
            $table->string('dni')->nullable();
            $table->string('celular')->nullable();
            $table->string('profesion')->nullable();
            // $table->integer('medico_id')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('edad')->nullable();
            $table->enum('sexo', ['M', 'F', 'Otro'])->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->nullable();
            $table->enum('grupo_sanguineo', ['A', 'B', 'AB', 'O'])->nullable();
            $table->enum('rh', ['+', '-'])->nullable();
            $table->string('direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('foto')->nullable();
            // $table->string('ocupacion')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->comment('REFERENCIA HACIA USUARIOS');
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
        Schema::dropIfExists('informacion_users');
    }
}
