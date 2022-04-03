<?php

namespace App\Http\Controllers;

use App\Models\SearchModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{
    public function search(Request $request) {
        $cities = SearchModel::where("name", "LIKE", $request->search . '%')->skip(0)->take(100)->get();
        if(count($cities) > 0) {
            return  $cities;
        } else {
            return "Empty";
        }
    }

    public function searchWhether(Request $request){
        $apiKey = config('services.openweather.key');
        $response = Http::get('https://api.openweathermap.org/data/2.5/forecast?lat='.$request->lat.'&lon='.$request->lng.'&appid='.$apiKey.'');
        return $response->json();
}
}
