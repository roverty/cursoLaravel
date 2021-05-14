<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('nombre_imagen');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('dias');
            $table->integer('cupo_maximo');
            $table->integer('alumnos_registrados')->default(0);

            //Llave foráneas
            $table->unsignedBigInteger('semestre_id');
            $table->unsignedBigInteger('lugar_id');
            // Guardar fecha de creacion de creacion
            $table->timestamps();

            // Agregar restricciones de llave foránea
            /*$table->foreign('semestre_id')
                ->references('id')
                ->on('semestres');
            $table->foreign('lugar_id')
                ->references('id')
                ->on('lugars');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
