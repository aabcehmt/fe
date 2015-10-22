<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) 
        {
           $table->engine = 'InnoDB';
            # === TIMESTAMPS ====================
            $table->nullableTimestamps();
            $table->softDeletes();
            # ===================================
            
            # === COLUMNS =======================
            $table->increments('id');
            
            $table->enum('personeria', ['fisica','juridica'])->default('fisica');
            $table->enum('genero', ['masculino','femenino'])->nullable();

            $table->string('nombre')->default('');
            $table->string('apellido')->default('');
            $table->string('documento')->default('');
            $table->date('nacimiento')->nullable();
            
            $table->string('about')->default('');

            $table->integer('domicilio_id')->unsigned()->nullable();
            # ===================================
            
            # === FOREING KEYS ==================
            $table->foreign('domicilio_id')
                    ->references('id')
                    ->on('domicilios');
            # ===================================
            
            # === INDEX =========================
            $table->index(['apellido','nombre']);
            $table->index('documento');
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
        Schema::drop('personas');
    }
}
