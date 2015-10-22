<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentos extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            # === TIMESTAMPS ====================
            $table->nullableTimestamps();
            $table->softDeletes();
            # ===================================
            
            # === COLUMNS =======================
            $table->increments('id');
            
            $table->string('nombre')->default('');  //Nombre del Departamento
            $table->string('categoria')->default('departamento');   //Nombre con el que se conoce la division politica.

            $table->integer('provincia_id')->unsigned()->nullable();
            # ===================================
            
            # === FOREING KEYS ==================
            $table->foreign('provincia_id')
                    ->references('id')
                    ->on('provincias');
            # ===================================
            
            # === INDEX =========================
            $table->index('nombre');
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
        Schema::drop('departamentos');
    }

}