<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class SafraStoreRequest extends FormRequest
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
            'empresa_id' => ['required', 'integer', 'exists:empresas,id'],
            'ano_agricula_id' => ['required', 'integer', 'exists:ano_agriculas,id'],
            'uuid' => ['required'],
            'nome' => ['required', 'string', 'unique:safras,nome'],
            'inicio_safra' => ['date'],
            'final_safra' => ['date'],
            'status' => ['required'],
            'softdeletes' => ['required'],
        ];
    }
}
