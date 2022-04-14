<?php

namespace App\Http\Resources;

use App\Models\Weather;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{

    /** @var Weather */
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'city_name'=> $this->city_name,
            'dt_txt' => $this->dt_txt,
            'temp' => $this->temp,
            'description' => $this->description,
            'speed' => $this->speed,
            'humidity' => $this->humidity,
            'list_pop' => $this->list_pop,
            'weather_icon' => $this->weather_icon,
            'created_at' => $this->created_at
        ];
    }
}
