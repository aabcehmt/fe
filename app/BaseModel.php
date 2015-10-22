<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseModel extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /*
        While $fillable serves as a "white list" of attributes that should be mass assignable, 
        you may also choose to use $guarded. 

        The $guarded property should contain an array of attributes that you do not want to be mass assignable. 
        All other attributes not in the array will be mass assignable. 

        So, $guarded functions like a "black list". 

        Of course, you should use either $fillable or $guarded - not both.
    */
        
    /**
     *  Return an array, made from all the items in "$items", whose keys and values
     *  are made from the source attributes "$key" and "$value" respectively.
     *
     *  @param  array $items : the source
     *  @param  string $key : the name of an attribute from the source
     *  @param  string $value : the name of an attribute from the source
     *  
     *  @return array
     *
     *  @example 
     *      Suppose $key == 'an_attribute', then you should be able to access 
     *          
     *          $items->an_attribute
     *
     *      So, both "$key" and "$value" are not attributes from the source "$items", 
     *      just the name of them.
     */
    protected static function getListFields( $items,$key,$value )
    {
        $select_fields = array();

        foreach ( $items as $item ) {

            $my_key 	= $item->$key;
            $my_value 	= $item->$value;

            $select_fields[$my_key] = $my_value;
        }

        return $select_fields;
    }

    protected function specialUcwords($value='')
    {
        // Esto hay que manejarlo con expresiones regulares

        $value = str_replace( ".",     ". ", $value );  // Traduce: "G.M.V."    => "G. M. V."
        $value = str_replace( ".  ",   ". ", $value );  // Traduce: "G.  M. V." => "G. M. V."

        $value = str_replace( ",",     ", ", $value );  // Traduce: "Vogt,Gon"   => "Vogt, Gon"
        $value = str_replace( ",  ",   ", ", $value );  // Traduce: "Vogt,  Gon" => "Vogt, Gon"
        $value = str_replace( " ,",    ",", $value );   // Traduce: "Vogt , Gon" => "Vogt, Gon"

        $value = ucwords(strtolower($value));

        return $value;
    }
}
