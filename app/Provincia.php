<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pais;
use App\Provincia;
use App\Departamento;
use App\Localidad;

class Provincia extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'provincias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'alias',
        'iso',
        'categoria',
        'pais_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    # === FOREING KEYS ============================================================================
        /**
         * FOREING KEY
         */
        public function pais() 
        {
        	return $this->hasOne('App\Pais','id','pais_id');
        }
    # =============================================================================================

    # === VIRTUAL ATTRIBUTES ======================================================================
        /**
         * Define a new attribute for the model, but not for the database.
         */
        public function getFullNameAttribute() {

            $pcia_nombre = ucwords($this->nombre);
            $pais_alias = strtoupper($this->pais->iso_alfa3);
                
                $full_name = $pcia_nombre.' ['.$pais_alias.']';
                
            return $full_name;
        }
    # =============================================================================================

    # === QUERYS ==================================================================================
        /**
         * Atributo: full_name
         */
        public function getNombreAttribute($value) 
        {
            $nombre = ucwords(strtolower($value));
                
            return $nombre;
        }
    # =============================================================================================
}
