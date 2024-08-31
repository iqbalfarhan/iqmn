<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImsakiyahResource extends JsonResource
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
            'kota' => $this->kota,
            'hijriyah' => $this->hijriyah,
            'masehi' => $this->masehi,
            'imsak' => $this->imsak,
            'subuh' => $this->subuh,
            'dzuhur' => $this->dzuhur,
            'ashar' => $this->ashar,
            'maghrib' => $this->maghrib,
            'isya' => $this->isya,
            'date_status' => $this->date_status,
        ];
    }
}
