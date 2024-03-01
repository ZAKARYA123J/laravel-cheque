<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'bank_id' =>'required',
            'rib' =>'required|digits_between:2,24',
            'adress_id' =>'required|string',
        ];
    }

    public function messages()
         {
     // use trans instead on Lang
             return [
          'bank_id.required' => 'chosse bank name',
          'rib.required' =>'enter rib',
          'adress_id.required' =>'enter adress',

             ];
         }
}
