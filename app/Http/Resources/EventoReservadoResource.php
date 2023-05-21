<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventoReservadoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'user' => $this->user->name,
            'imagen' => '/storage/'.$this->imagen,
            'detalle' => $this->detalle,
            'precio' => '$ '.$this->precio,
            'duracion' => $this->duracion.' hora(s)',
        ];
    }
}
