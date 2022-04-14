<?php

namespace App\Http\Controllers;

use App\Classes\Contracts\Services\WeatherService;
use App\Http\Requests\WeatherStoreRequest;
use App\Http\Resources\WeatherResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WeatherController extends Controller
{

    private WeatherService $obWeatherService;

    public function __construct(WeatherService $obWeatherService)
    {
        $this->obWeatherService = $obWeatherService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $weathers = $this->obWeatherService->index();
        return WeatherResource::collection($weathers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  WeatherStoreRequest  $request
     * @return WeatherResource
     */
    public function store(WeatherStoreRequest $request): WeatherResource
    {
        $weathers = $this->obWeatherService->store($request);
        return new WeatherResource($weathers);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
