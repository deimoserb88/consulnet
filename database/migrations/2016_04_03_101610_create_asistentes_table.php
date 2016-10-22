<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_medico')->unsigned();            
            $table->timestamps();

            $table->foreign('id_user')
                    ->references('id')->on('users')
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
        Schema::drop('asistentes');
    }
}
