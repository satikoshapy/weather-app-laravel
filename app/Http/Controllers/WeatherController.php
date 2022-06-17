<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index() {

        $response = Http::get('https://api.openweathermap.org/data/2.5/weather?appid=5dd765a29b95b2e058dfd9f33a1dbd0d&q=genk');

        $weather_data = json_decode($response->body());
        


        return view('start-page', compact('weather_data'));
       
    }
}
