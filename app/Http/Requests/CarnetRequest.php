<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarnetRequest extends FormRequest
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
            'compte_id' => 'required',
            'type' => 'required|string',
            'numberdocarnet' => 'required',
            'quantite_min' => 'required|integer',
            'Serie' => 'required|alpha:ascii',
            'Start_Number' => 'required|integer',
            'Dernier_Number' => 'required|integer',
        ];
    }

    public function messages()
    {
        // use trans instead on Lang
        return [
            'compte_id.required' => 'select compte',
            'type.required' => 'select type',
            'numberdocarnet.required' => 'select number',
            'quantite_min.required' => 'enter quantite min',
            'Serie.required' => 'enter Serie',
            'Start_Number.required' => 'enter position actuelt',
            'Dernier_Number.required' => 'enter Dernier Number',

        ];
    }

}
