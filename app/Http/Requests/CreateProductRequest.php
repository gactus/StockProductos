<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
        return [
            'txtCodigo'         =>  'required|string|min:1|max:6',
            'txtNombre'         =>  'required|string|min:5|max:100',
            'lstCategoria'      =>  'required',
            'lstSucursal'       =>  'required',
            'txtDescripcion'    =>  'required|string|min:10|max:100',
            'txtPrecio'         =>  'required|integer|min:100|max:99999',
            'txtStock'          =>  'required|integer|min:20|max:1000',
        ];
    }
}
