<?php namespace App\Http\Requests\cities\calles;

use App\Http\Requests\Request;

class CreateCalleRequest extends Request
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
            'nombre'        => 'required',
            'tipo'          => 'required',
            'localidad_id'  => 'required'
        );

        return $rules;
    }
}
