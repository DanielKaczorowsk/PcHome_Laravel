<?php
 
namespace App\resources;
 
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
 
class CennikResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'usluga' => $this->usluga,
            'urzadzenie' => $this->urzadzenie,
            'cena' => $this->cena,
        ];
    }
}