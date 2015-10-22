<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calles', function (Blueprint $table) 
        {
            $table->engine = 'InnoDB';
            # === TIMESTAMPS ====================
            $table->nullableTimestamps();
            $table->softDeletes();
            # ===================================
            
            # === COLUMNS =======================
            $table->increments('id');

            $table->string('nombre')->default('');
            $table->string('tipo')->default('');
            
            $table->integer('localidad_id')->unsigned()->nullable();
            # ===================================

            # === FOREING KEYS ==================
            $table->foreign('localidad_id')
                    ->references('id')
                    ->on('localidades');
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
        Schema::drop('calles');
    }
}
