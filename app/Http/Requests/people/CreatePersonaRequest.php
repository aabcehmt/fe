<?php namespace App\Http\Requests\people;

use App\Http\Requests\Request;

class CreatePersonaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array (
            'domicilio_id'  => '', 
            'personeria'    => '', 
            'genero'        => '', 
            'nombre'        => 'required', 
            'apellido'      => 'required', 
            'documento'     => 'required',  
            'nacimiento'    => '',  
            'about'         => '', 
        );

        return $rules;
    }
}
