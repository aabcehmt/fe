<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        /*for ($i = 1; $i <= 2; $i++) {
            $this->command->info('User '.$i);
        
            DB::table('users')->insert(array ( 
                "name"      => $faker->userName, 
                "email"     => $faker->unique()->safeEmail,
                //"name"      => 'embajada77', 
                //"email"     => 'embajada77@gmail.com',
                "password"  => Hash::make('1234')
            ));
        }*/

        $users_array = array ();
        $tope = 5518;

        $cronom = new cronometro();
        $password = Hash::make('1234');
        for ($i = 1; $i <= $tope; $i++) {
            $users_array[$i] = array ( 
                "name"      => $faker->userName, 
                "email"     => $faker->unique()->safeEmail,
                "password"  => $password
            );
            $prcnt = ROUND($i*100/$tope,2);
            
            $string_time = $cronom->getTiempoTranscurrido().' '.$cronom->EstimarTiempoRestante($prcnt);
            $this->command->info( $string_time.' '.$prcnt.'% User '.$i.'/'.$tope);
        }
        DB::table('users')->insert( $users_array );
    } 
}

class cronometro {
    #=== ATRIBUTOS ============================================================================
        private $inicio;
         /*
            // Antes del mediodía, despues del mediodía, am o pm (minúsculas)
            date("a");
            // Antes del mediodía, despues del mediodía, AM o PM (mayúsculas)
            date("A");
            // Horario de 12 horas sin ceros, de 1 a 12
            date("g");
            // Horario de 12 horas con ceros, de 01 a 12
            date("h");
            // Horario de 24 horas sin ceros, de 0 a 23
            date("G");
            // Horario de 24 horas con ceros, de 01 a 23
            date("H");
            // minutos con ceros iniciales
            date("i");
            // segundos con ceros iniciales
            date("s");
        */
    #==========================================================================================
        
    #=== CONSTRUCTORES ========================================================================
        public function __construct() {
            $this->inicio = date("H:i:s");
        }
    #==========================================================================================
    
    #=== CONSULTAS ============================================================================
        public function getInicio() { return $this->inicio; }

        public function getTiempoTranscurrido() {
            $now = date("H:i:s");
            $transcurrio = $this->RestarHoras( self::getInicio(),$now );

            return $transcurrio;
        }

        public function EstimarTiempoRestante( $prcnt_transcurrido ) {
            $tRestante = 0;
            if ( $prcnt_transcurrido>0 ) { 
                $tTranscurrido = self::getTiempoTranscurrido();
                $tTranscurrido = self::hr2sec( $tTranscurrido );

                $prcnt_restante = 100 - $prcnt_transcurrido;
                $tRestante = $tTranscurrido*$prcnt_restante/$prcnt_transcurrido;
            }
            $tRestante = self::sec2hr( $tRestante );
            return $tRestante;
        }

        public function RestarHoras($horaini,$horafin) {

            $ini = $this->hr2sec( $horaini );
            $fin = $this->hr2sec( $horafin );
            $dif = $fin - $ini;
            $rta = $this->sec2hr( $dif );

            return $rta;
        }

        public function hr2sec( $hora ) {
            $xhr  = substr($hora,0,2);
            $xmin = substr($hora,3,2);
            $xseg = substr($hora,6,2);

            $rta = ((($xhr*60)*60)+($xmin*60)+$xseg);
            return $rta;
        }

        public function sec2hr( $seg ) {
            $xhr  = floor($seg/3600);
            $xmin = floor(($seg-($xhr*3600))/60);
            $xseg = $seg-($xmin*60)-($xhr*3600);

            $rta = date("H:i:s",mktime($xhr,$xmin,$xseg));
            return $rta;
        }
    #==========================================================================================
}