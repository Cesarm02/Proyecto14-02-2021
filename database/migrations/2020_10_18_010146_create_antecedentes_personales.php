<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentesPersonales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_personales', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',['antecedentes_personales','antecedentes_familiares','alergias','vacunas','tratamientos','intervenciones_quirúrgicas']);
            $table->date('fecha_diagnostico')->nullable();
            $table->string('nombre')->nullable();
            
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('antecedentes_personales');
    }
}
