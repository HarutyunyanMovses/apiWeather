<?php

namespace App\Http\Controllers;

use App\Classes\Contracts\Services\SearchService;
use App\Http\Resources\SearchResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{

    /**
     * url for openWeather site
     */
    private const URL = 'https://api.openweathermap.org/data/2.5/forecast';


    private SearchService $obSearchService;

    public function __construct(SearchService $obSearchService)
    {
        $this->obSearchService = $obSearchService;
    }


    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function search(Request $request): AnonymousResourceCollection
    {
        $cities = $this->obSearchService->search($request->search);
        return SearchResource::collection($cities);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function searchWhether(Request $request)
    {
        $apiKey = config('services.openweather.key');
        $response = Http::get(self::URL . '?lat=' . $request->lat . '&lon=' . $request->lng . '&appid=' . $apiKey . '');
        return $response->json();
    }

}
