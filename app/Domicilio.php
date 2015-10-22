<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'domicilios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'calle_id',
    	'altura', 
    	'torre', 
    	'acceso', 
    	'piso', 
    	'dpto', 
    	'agregado', 
    	'about'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    # === FOREING KEYS ============================================================================
        public function calle() 
        {
        	return $this->hasOne('App\Calle','id','calle_id');
        }
    # =============================================================================================

    # === VIRTUAL ATTRIBUTES ======================================================================
        public function getFullNameAttribute() 
        {

            $full_name = $this->calle->nombre .' '. $this->altura;
                
            return $full_name;
        }
    # =============================================================================================

    
    # === QUERYS ==================================================================================
    # =============================================================================================
}
