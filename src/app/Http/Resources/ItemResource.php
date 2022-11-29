<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // TODO owner_id and type_id should be mapped to Models ??? or just their id's
        return [
            'id' => $this->id,
            'name' => $this->name,
            'owner_id' => $this->owner_id,
            'type_id' => $this->type_id,
            'description' => $this->description,
            'warranty_start' => $this->warranty_start,
            'warranty_months' => $this->warranty_months,
            'warranty_proof' => $this->warranty_proof,
        ];
    }
}
