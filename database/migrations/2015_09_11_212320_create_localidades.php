<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalidades extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidades', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            # === TIMESTAMPS ====================
            $table->nullableTimestamps();
            $table->softDeletes();
            # ===================================
            
            # === COLUMNS =======================
            $table->increments('id');
            
            $table->string('nombre')->default('');              //Nombre de la Localidad
            $table->string('codigo_postal',16)->default('');    //Código Postal
            $table->string('codigo_area',4)->default('');       //Código de Area Telefonico
            $table->string('categoria')->default('localidad');  //Nombre con el que se conoce la division politica.

            $table->integer('departamento_id')->unsigned()->nullable();
            # ===================================
            
            # === FOREING KEYS ==================
            $table->foreign('departamento_id')
                    ->references('id')
                    ->on('departamentos');
            # ===================================
            
            # === INDEX =========================
            $table->index('nombre');
            $table->index('codigo_postal');
            $table->index('codigo_area');
            # ===================================
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('localidades');
    }

}