<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincias extends Migration {

    /**
     * Run the migrations.  
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            # === TIMESTAMPS ====================
            $table->nullableTimestamps();
            $table->softDeletes();
            # ===================================
            
            # === COLUMNS =======================
            $table->increments('id');
            
            $table->string('nombre')->default('');      //Nombre de la Provincia
            $table->string('alias',4)->default('');     //Alias
            $table->string('iso',4)->default('');       //ISO 3166-2
            $table->string('categoria')->default('provincia');  //Nombre con el que se conoce la division politica.

            $table->integer('pais_id')->unsigned()->nullable();
            # ===================================
            
            # === FOREING KEYS ==================
            $table->foreign('pais_id')
                    ->references('id')
                    ->on('paises');
            # ===================================

            # === INDEX =========================
            $table->index('nombre');
            $table->index('alias');
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
        Schema::drop('provincias');
    }

}