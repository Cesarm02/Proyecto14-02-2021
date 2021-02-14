<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasMedicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas_medicas', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('descripcion');
            $table->string('color');
            $table->string('textColor');
            $table->dateTime('start');
            $table->dateTime('end');

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
        Schema::dropIfExists('citas_medicas');
    }
}
