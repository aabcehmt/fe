<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pais;
use App\Provincia;
use App\Departamento;
use App\Localidad;

class Departamento extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departamentos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    # === FOREING KEYS ============================================================================
        /**
         * Define the relations for the model.
         */
        public function provincia() 
        {
        	return $this->hasOne('App\Provincia','id','provincia_id');
        }
    # =============================================================================================

    # === VIRTUAL ATTRIBUTES ======================================================================
        /**
         * Define a new attribute for the model, but not for the database.
         */
        public function getFullNameAttribute() 
        {
            $nombre_dpto = ucwords($this->nombre);
            $nombre_pcia = $this->provincia->full_name;

            $full_name = $nombre_dpto.', '.$nombre_pcia;

            return $full_name;
        }
    # =============================================================================================

    # === QUERYS ==================================================================================
        /**
         * Redefine the get query for this attribute.
         */
        public function getNombreAttribute($value) 
        {
            $nombre = ucwords(strtolower($value));
                
            return $nombre;
        }

        /**
         * 
         * @return a list of objects.
         */
        public static function listByFullName()
        {
            $items  = Departamento::all();
            $key    = 'id';
            $value  = 'full_name';

            return Departamento::getListFields($items,$key,$value);
        }
    # =============================================================================================

    
}
