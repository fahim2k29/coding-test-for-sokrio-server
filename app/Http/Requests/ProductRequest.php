<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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


    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required|unique:products,code,'.@$this->products->id,
            'price' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            //
        ];
    }
}
