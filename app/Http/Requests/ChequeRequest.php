<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChequeRequest extends FormRequest
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
            'Concerne' =>'required',
            'date_emission' =>'required',
            'date_paiement' =>'required',
            'benefisaire' =>'required|integer',
            'Montant' =>'required|integer',
            'Duplicata_sur' =>'required|string',
        ];
    }

    public function messages()
         {
     // use trans instead on Lang
             return [
          'Concerne.required' =>'enter Concerne',
          'date_emission.required' =>'enter date emission',
          'date_paiement.required' =>'enter date paiement',
          'benefisaire.required' =>'enter benefisaire',
          'Montant.required' =>'enter Montant',
          'Duplicata_sur.required' =>'select Duplicata sur',

             ];
         }
}
