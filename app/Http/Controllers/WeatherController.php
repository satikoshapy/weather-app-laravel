<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Data;

class WeatherController extends Controller
{
    public function index() {

        $response = Http::get('https://api.openweathermap.org/data/2.5/weather?appid=5dd765a29b95b2e058dfd9f33a1dbd0d&q=genk');

        $weather_data = json_decode($response->body());
        


        return view('start-page', compact('weather_data'));
       
    }

    public function average_store(Request $request) {

        Data::create([
            'temp_min' => $request->input('temp_min'),
            'temp_max' => $request->input('temp_max')
        ]);
        



        return redirect('average/');
       
    }

    public function average() {

        $dataset = Data::all();

        $min_temp_average = Data::avg('temp_min');

        $max_temp_average = Data::avg('temp_max');
       
        return view('average', compact('min_temp_average', 'max_temp_average', 'dataset'));
    }
}
