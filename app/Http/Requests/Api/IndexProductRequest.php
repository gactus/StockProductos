<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class IndexProductRequest extends FormRequest
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
            'product_code'         =>  'sometimes|string|min:1|max:6',
            'product_name'         =>  'sometimes|string|min:5|max:100',
            'branch_id'             =>  'nullable|sometimes|int'
        ];
    }
}