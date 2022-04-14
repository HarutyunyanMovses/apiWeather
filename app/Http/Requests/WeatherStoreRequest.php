<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeatherStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city_name'=> 'required|string|min:3|max:255',
            'dt_txt' => 'required|date',
            'temp' => 'required|numeric',
            'description' => 'required|string|max:255|min:3',
            'speed' => 'required|numeric',
            'humidity' => 'required|numeric',
            'list_pop' => 'required|numeric',
            'weather_icon' => 'required|string'
        ];
    }
}
