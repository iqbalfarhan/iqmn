<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KelasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image_url,
            'desc' => $this->desc,
            'code' => $this->code,
            'material' => MaterialResource::collection($this->materials),
            'members' => UserResource::collection($this->users),
        ];
    }
}
