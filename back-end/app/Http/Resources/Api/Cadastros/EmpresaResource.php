<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'nome' => $this->nome,
            'cnpj' => $this->cnpj,
            'inscricao' => $this->inscricao,
            'url' => $this->url,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'logo' => $this->logo,
            'status' => $this->status,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
