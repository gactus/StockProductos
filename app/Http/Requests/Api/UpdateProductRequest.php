<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product_code'          =>  'sometimes|string|min:1|max:6',
            'product_name'          =>  'sometimes|string|min:5|max:100',
            'description'           =>  'sometimes|string|min:10|max:100',
            'product_price'         =>  'sometimes|integer',
            'product_stock'         =>  'sometimes|integer',
            'category_id'           =>  'sometimes|integer',
            'product_status'        =>  'sometimes|boolean',
            'branch_id'             =>  'sometimes|integer'
        ];
    }
}
