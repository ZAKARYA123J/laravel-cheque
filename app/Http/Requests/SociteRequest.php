<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SociteRequest extends FormRequest
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
            'name_s' =>['required','string'],
            'desc_s' =>['string'],
            'logo_link' =>['string'],
        ];
    }
}
