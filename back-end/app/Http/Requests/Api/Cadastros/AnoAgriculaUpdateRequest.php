<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class AnoAgriculaUpdateRequest extends FormRequest
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
            'nome' => ['required', 'string', 'unique:ano_agriculas,nome'],
            'data_abertura' => ['required', 'date'],
            'data_fechamento' => ['required', 'date'],
            'status' => ['required', 'in:ATIVO,DESATIVADO'],
        ];
    }
}
