<?php

use Illuminate\Database\Seeder;

class ProvinciasArgentinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->insert(array(
            array ( 
            	"id" 		=> 1, 
            	"nombre" 	=> "buenos aires", 
            	"alias" 	=> "pba", 
            	"iso" 		=> "AR-B", 
            	"categoria"	=> "provincia", 
            	"pais_id" 	=> 1 
            ),
            array ( "id" => 2, "nombre" => "catamarca", "alias" => "cat", "iso" => "AR-K", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 3, "nombre" => "chaco", "alias" => "cha", "iso" => "AR-H", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 4, "nombre" => "chubut", "alias" => "chu", "iso" => "AR-U", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 5, "nombre" => "cordoba", "alias" => "cba", "iso" => "AR-X", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 6, "nombre" => "corrientes", "alias" => "cte", "iso" => "AR-W", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 7, "nombre" => "entre rios", "alias" => "eri", "iso" => "AR-E", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 8, "nombre" => "formosa", "alias" => "for", "iso" => "AR-P", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 9, "nombre" => "jujuy", "alias" => "juy", "iso" => "AR-Y", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 10, "nombre" => "la pampa", "alias" => "lpa", "iso" => "AR-L", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 11, "nombre" => "la rioja", "alias" => "lri", "iso" => "AR-F", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 12, "nombre" => "mendoza", "alias" => "mza", "iso" => "AR-M", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 13, "nombre" => "misiones", "alias" => "mis", "iso" => "AR-N", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 14, "nombre" => "neuquen", "alias" => "neu", "iso" => "AR-Q", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 15, "nombre" => "rio negro", "alias" => "rng", "iso" => "AR-R", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 16, "nombre" => "salta", "alias" => "sta", "iso" => "AR-A", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 17, "nombre" => "san juan", "alias" => "sju", "iso" => "AR-J", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 18, "nombre" => "san luis", "alias" => "slu", "iso" => "AR-D", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 19, "nombre" => "santa cruz", "alias" => "scr", "iso" => "AR-Z", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 20, "nombre" => "santa fe", "alias" => "sfe", "iso" => "AR-S", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 21, "nombre" => "santiago del estero", "alias" => "sgo", "iso" => "AR-G", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 22, "nombre" => "tierra del fuego", "alias" => "tdf", "iso" => "AR-V", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 23, "nombre" => "tucuman", "alias" => "tuc", "iso" => "AR-T", "categoria" => "provincia", "pais_id" => 1 ),
            array ( "id" => 24, "nombre" => "ciudad autonoma de bs. as.", "alias" => "caba", "iso" => "AR-C", "categoria" => "ciudad autonoma", "pais_id" => 1 ),
        ));
		
		
    }
}

class ProvinciasChileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {		
		DB::table('provincias')->insert(array(
           	array ( 
           		"id" 		=> 25, 
           		"nombre"	=> "antofagasta", 
           		"alias" 	=> "", 
           		"iso"		=> "CL-AN", 
           		"categoria" => "region", 
           		"pais_id" 	=> 46 
           	),
            array ( "id" => 26, "nombre" => "arica y parinacota", "alias" => "", "iso" => "CL-AP", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 27, "nombre" => "atacama", "alias" => "", "iso" => "CL-AT", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 28, "nombre" => "aysen del general carlos ibáñez del campo", "alias" => "", "iso" => "CL-AI", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 29, "nombre" => "bío-bío", "alias" => "", "iso" => "CL-BI", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 30, "nombre" => "coquimbo", "alias" => "", "iso" => "CL-CO", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 31, "nombre" => "la araucanía", "alias" => "", "iso" => "CL-AR", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 32, "nombre" => "los lagos", "alias" => "", "iso" => "CL-LL", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 33, "nombre" => "los ríos", "alias" => "", "iso" => "CL-LR", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 34, "nombre" => "magallanes y de la antártica chilena", "alias" => "", "iso" => "CL-MA", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 35, "nombre" => "maule", "alias" => "", "iso" => "CL-ML", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 36, "nombre" => "región metropolitana de santiago", "alias" => "", "iso" => "CL-RM", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 37, "nombre" => "tarapacá", "alias" => "", "iso" => "CL-TA", "categoria" => "region", "pais_id" => 46 ),
            array ( "id" => 38, "nombre" => "valparaíso", "alias" => "", "iso" => "CL-VS", "categoria" => "region", "pais_id" => 46 )
        ));
    }
}

class ProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {		
		$this->call('ProvinciasArgentinaTableSeeder');
        $this->call('ProvinciasChileTableSeeder');
    }
}