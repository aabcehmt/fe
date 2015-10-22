<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'domicilio_id', 
    	'personeria', 
    	'genero', 
    	'nombre', 
    	'apellido', 
    	'documento', 
    	'nacimiento', 
    	'about'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    # === FOREING KEYS ============================================================================
        
        public function domicilio() 
        {
        	return $this->hasOne('App\Domicilio','id','calle_id');
        }
    # =============================================================================================

    # === VIRTUAL ATTRIBUTES ======================================================================
        public function getFullNameAttribute() {

            $full_name = $this->calle->nombre .' '. $this->apellido;
                
            return $full_name;
        }
    # =============================================================================================
}