<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paises', function (Blueprint $table) 
        {
            $table->engine = 'InnoDB';
            # === TIMESTAMPS ====================
            $table->nullableTimestamps();
            $table->softDeletes();
            # ===================================

            # === COLUMNS =======================
            $table->increments('id');
            
            $table->string('nombre')->default('');          //Nombre del País en Español
            $table->string('nombre_en')->default('');       //Nombre del País en Ingles

            $table->string('iso_alfa2',4)->default('');     //ISO 3166-1 ALFA 2
            $table->string('iso_alfa3',4)->default('');     //ISO 3166-1 ALFA 3
            $table->mediumInteger('iso_num')->default(0);   //ISO 3166-1 NUMÉRICO
            
            $table->string('tel_prefijo',4)->default('');   //Prefijo Telefónico Internacional
            $table->string('lenguaje',4)->default('');      //Lengua Oficial
            # ===================================
            
            # === FOREING KEYS ==================
            # ===================================
            
            # === INDEX =========================
            $table->index('nombre');
            $table->index('iso_alfa2');
            $table->index('iso_alfa3');
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
        Schema::drop('paises');
    }
}