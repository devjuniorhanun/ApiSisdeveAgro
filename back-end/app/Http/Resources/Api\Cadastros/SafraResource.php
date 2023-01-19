<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Resources\Json\JsonResource;

class SafraResource extends JsonResource
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
            'id' => $this->id,
            'empresa_id' => $this->empresa_id,
            'ano_agricula_id' => $this->ano_agricula_id,
            'uuid' => $this->uuid,
            'nome' => $this->nome,
            'inicio_safra' => $this->inicio_safra,
            'final_safra' => $this->final_safra,
            'status' => $this->status,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
