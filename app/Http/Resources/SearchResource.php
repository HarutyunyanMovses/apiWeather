<?php

namespace App\Http\Resources;

use App\Models\SearchModel;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
{

    /** @var SearchModel */
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'lat' => $this->lat,
            'lng' => $this->lng,
        ];
    }
}
