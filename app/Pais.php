<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paises';

    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'nombre_en',
        'iso_alfa2',
        'iso_alfa3',
        'iso_num',
        'tel_prefijo',
        'lenguaje'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    # === FOREING KEYS ============================================================================
    # =============================================================================================
    
    # === VIRTUAL ATTRIBUTES ======================================================================
        /**
         * Define a new attribute for the model, but not for the database.
         */
        public function getCodigoTelefonicoAttribute() 
        {
            $codigo = '+' . $this->tel_prefijo;
                
            return $codigo;
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
    # =============================================================================================
    
    # === COMMANDS ================================================================================
    # =============================================================================================
}
