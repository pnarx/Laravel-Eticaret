<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'sucject' =>'required',
            'message' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'İsim Soyisim Zorunludur.','email.required'=>'Email Adresi Zorunludur.','message.required'=>'Mesaj Alanı Zorunludur.',
        'sucject.required'=>'Subject Alanı Zorunludur.',
        ];
    }
}
