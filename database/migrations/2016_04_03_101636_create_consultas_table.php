<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('sintomas');
            $table->mediumText('diagnostico');
            $table->mediumText('tratamiento');
            $table->integer('id_cita')->unsigned();
            $table->integer('id_paciente')->unsigned();
            $table->integer('id_medico')->unsigned();             
                         

            $table->timestamps();

            $table->foreign('id_cita')
                    ->references('id')->on('citas')
                    ->onDelete('cascade');

            $table->foreign('id_paciente')
                    ->references('id')->on('pacientes')
                    ->onDelete('cascade');

            $table->foreign('id_medico')
                    ->references('id')->on('medicos')
                    ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consultas');
    }
}
