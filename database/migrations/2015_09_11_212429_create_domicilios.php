<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomicilios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) 
        {
            $table->engine = 'InnoDB';
            # === TIMESTAMPS ====================
            $table->nullableTimestamps();
            $table->softDeletes();
            # ===================================
            
            # === COLUMNS =======================
            $table->increments('id');

            $table->string('altura')->default('');      
            $table->string('torre')->default('');
            $table->string('acceso')->default(''); 
            $table->string('piso')->default('');
            $table->string('dpto')->default('');
            $table->string('agregado')->default('');
            $table->string('about')->default('');
            
            $table->integer('calle_id')->unsigned()->nullable();
            # ===================================
            
            # === FOREING KEYS ==================
            $table->foreign('calle_id')
                    ->references('id')
                    ->on('calles');
            # ===================================
            
            # === INDEX =========================
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
        Schema::drop('domicilios');
    }
}
