<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPacientesTableAgragacampos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function(Blueprint $table){
            $table->integer('id_user')->unsigned()->after('id');
            $table->date('fena')->nullable()->after('id_user');            
            $table->integer('ts')->nullable()->after('fena');
            $table->mediumtext('con_esp')->nullable()->after('ts');
            
            $table->foreign('id_user')
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
        //
    }
}
