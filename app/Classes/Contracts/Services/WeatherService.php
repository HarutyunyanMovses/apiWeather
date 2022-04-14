<?php
declare(strict_types=1);

namespace App\Classes\Contracts\Services;

use App\Http\Requests\WeatherStoreRequest;
use App\Models\Weather;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

/**
 * Interface SearchService
 * @package App\Classes\Contracts\Services
 */
interface WeatherService
{
    /**
     * @return Collection
     */

    public function index(): ?Collection;


    /**
     * @param WeatherStoreRequest $request
     * @return Weather
     */
    public function store(WeatherStoreRequest $request): Weather;


}

