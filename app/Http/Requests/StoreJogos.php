<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJogos extends FormRequest
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
            'clube_mandante_id' => 'required|integer',
            'gols_mandante' => 'required|integer',
            'clube_visitante_id' => 'required|integer',
            'gols_visitante' => 'required|integer',
        ];
    }
}
