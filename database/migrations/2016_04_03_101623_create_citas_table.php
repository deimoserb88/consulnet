<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecita');
            $table->date('feregistro');
            $table->integer('hh');
            $table->integer('mm');
            $table->integer('id_paciente')->unsigned();
            $table->integer('id_medico')->unsigned(); 
            $table->integer('id_user_reg')->unsigned();             
            $table->timestamps();

            $table->foreign('id_paciente')
                    ->references('id')->on('pacientes')
                    ->onDelete('cascade');

            $table->foreign('id_medico')
                    ->references('id')->on('medicos')
                    ->onDelete('cascade');            

            $table->foreign('id_user_reg')
                    ->references('id')->on('users')
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
        Schema::drop('citas');
    }
}
