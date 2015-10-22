<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Calle extends BaseModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'calles';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'nombre',
    	'tipo',
    	'localidad_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    # === FOREING KEYS ============================================================================
        
        public function localidad() 
        {
            return $this->hasOne('App\Localidad','id','localidad_id');
        }
    # =============================================================================================

    # === VIRTUAL ATTRIBUTES ======================================================================
        /**
         * Atributo: full_name
         */
        public function getFullNameAttribute() 
        {
            $full_name = $this->nombre .', '. $this->localidad->full_name;

            return $full_name;
        }
    # =============================================================================================

    # === QUERYS ==================================================================================
        /**
         * Atributo: nombre
         */
        public function getNombreAttribute($value) 
        {
            $nombre = ucwords(strtolower($value));
            
            return $nombre;
        }
    # =============================================================================================
}
