<?php

namespace App\Http\Requests\Api;

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
            'product_code'          =>  'required|string|min:1|max:6',
            'product_name'          =>  'required|string|min:5|max:100',
            'product_description'   =>  'required|string|min:10|max:100',
            'product_price'         =>  'required|integer|min:1',
            'product_stock'         =>  'required|integer|min:1',
            'category_id'           =>  'required|integer',
            'branch_id'             =>  'required|integer',
        ];
    }
}
