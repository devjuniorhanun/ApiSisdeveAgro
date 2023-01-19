<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class AnoAgriculaResource extends JsonResource
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
            'nome' => $this->nome,
            'data_abertura' => Carbon::make($this->data_abertura)->format('d-m-Y'),
            'data_fechamento' => Carbon::make($this->data_fechamento)->format('d-m-Y'),
            'status' => $this->status,
            
        ];
    }
}
