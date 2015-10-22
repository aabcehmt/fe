<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pais;
use App\Provincia;
use App\Departamento;
use App\Localidad;

class Localidad extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'localidades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'codigo_postal',
        'codigo_area',
        'departamento_id'
    ];

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
        public function departamento() 
        {
        	return $this->hasOne('App\Departamento','id','departamento_id');
        }
    # =============================================================================================

    # === VIRTUAL ATTRIBUTES ======================================================================
        /**
         * Atributo: full_name
         */
        public function getFullNameAttribute() {

            $nombre_loc = $this->nombre;
            # $nombre_dpto = $this->departamento->full_name;
            $nombre_dpto = $this->departamento->nombre;
            $nombre_pcia = $this->departamento->provincia->nombre;
            $nombre_pais = $this->departamento->provincia->pais->iso_alfa3;

            $full_name = ' ';
            $full_name .= $nombre_loc;
            $full_name .= ' - '. $nombre_dpto;
            $full_name .= ', '. $nombre_pcia;
            $full_name .= ' ['. $nombre_pais .']';
                
            return $full_name;
        }
        
        /**
         * Atributo: full_name
         */
        public function getCodigoTelefonicoAttribute() {

            $codigo = '';
            //$codigo .= $this->departamento->provincia->pais->codigo_telefonico;
            $codigo .= ' (0)'.$this->codigo_area;
                
            return $codigo;
        }
    # =============================================================================================
    
    # === QUERYS ==================================================================================
        /**
         * Redefine the get query for this attribute.
         */
        public function getNombreAttribute($value)
        {
            $nombre = $this->specialUcwords($value);

            return $nombre;
        }

        /**
         * 
         * @return a list of objects.
         */
        public static function listByFullName()
        {
            $items  = Localidad::where('id','92')
                        ->orWhere('id','254')
                        ->get();
                        
            $key    = 'id';
            $value  = 'full_name';

            return Localidad::getListFields($items,$key,$value);
        }
    # =============================================================================================
}
