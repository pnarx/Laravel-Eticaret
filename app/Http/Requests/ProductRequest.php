<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

     public function rules()
     {
         return [
             'name' => 'required|string|max:255',
             'content' => 'required|string',

         ];
     }
    public function messages(): array
    {
        return [
            'name.required'=>'Ürün İsmi Zorunludur.',
            'name.string'=>'Ürün karakterlerden oluşmalıdır',
            'name.min'=>'Ürün minumum 3 karakterden olmalıdır',
            'content.required'=>' Ürün İçerik Zorunludur.',

        ];
    }
}
