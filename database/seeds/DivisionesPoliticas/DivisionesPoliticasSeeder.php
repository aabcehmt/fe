<?php

use Illuminate\Database\Seeder;

class DivisionesPoliticasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->filtrarDivisionesPoliticas();
    }

    public function filtrarDivisionesPoliticas() {
        $cargarArg = 1;
        $cargarChile = 0;
        $cargarTodo = 0;

        if ( $cargarTodo ) {
            $this->cargarDivisionesPoliticas();
        } else {
            if ( $cargarArg ) { $this->cargarDivisionesPoliticas('Argentina'); }
            if ( $cargarChile ) { $this->cargarDivisionesPoliticas('Chile'); }
        }
    }

    public function cargarDivisionesPoliticas( $pais='' ) {
        $this->command->info('Cargando divisiones politicas '.$pais);
        $this->call('Paises'.$pais.'TableSeeder');
        
        $this->command->info('Cargando Provincias '.$pais);
        $this->call('Provincias'.$pais.'TableSeeder');

        $this->command->info('Cargando Departamentos '.$pais);
        $this->call('Departamentos'.$pais.'TableSeeder');
        
        $this->command->info('Cargando Localidades '.$pais);
        $this->call('Localidades'.$pais.'TableSeeder');
    }
}
