<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherForecastController extends Controller
{
    public function weather()
    {
        return view('weather');
    }
    public function getWeatherForecast()
    {
        $response = Http::withoutVerifying()->get("https://api.open-meteo.com/v1/forecast?latitude=31.6340&longitude=74.872261&past_days=10&hourly=temperature_2m,relativehumidity_2m,windspeed_10m");

        if ($response->successful()) {
            $weatherData = $response->json();
            // return response()->json($weatherData);
            $formattedData = json_encode($weatherData, JSON_PRETTY_PRINT);

            // Output the beautified JSON response
            // echo '<pre>' . $formattedData . '</pre>';
            return view('weather', compact('weatherData'));
        } else {
            return response()->json(['error' => 'Failed to fetch weather data'], 500);
        }
    }
}
