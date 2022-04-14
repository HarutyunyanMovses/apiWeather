<?php
declare(strict_types=1);

namespace App\Services;

use App\Classes\Contracts\Services\WeatherService as WeatherServiceContract;
use App\Http\Requests\WeatherStoreRequest;
use App\Models\Weather;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class WeatherService
 * @package App\Services
 */
class WeatherService implements WeatherServiceContract
{
    /**
     * @inheritDoc
     */
    public function index(): ?Collection
    {
        return Weather::whereRaw('id % 5 = 1')->get();
    }

    /**
     * @inheritDoc
     */
    public function store(WeatherStoreRequest $request): Weather
    {
        $weatherResponceCreate = Weather::create($request->all());
        return $weatherResponceCreate;
    }


}

