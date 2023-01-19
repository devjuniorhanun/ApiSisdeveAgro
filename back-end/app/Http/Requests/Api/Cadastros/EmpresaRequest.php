<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'nome' => ['required', 'string', 'unique:empresas,nome'],
            'cnpj' => ['required', 'string', 'unique:empresas,cnpj'],
            'inscricao' => ['required', 'string', 'unique:empresas,inscricao'],
            'url' => ['string'],
            'email' => ['required', 'email', 'unique:empresas,email'],
            'telefone' => ['string'],
            'logo' => ['string'],
            'status' => ['required', 'in:ATIVA,DESATIVADA']
        ];
    }
}
