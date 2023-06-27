<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\WeatherForecastController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (request()->is('/') && request()->method() === 'GET') {
            $weatherForecastController = new WeatherForecastController();
            $weatherForecastController->getWeatherForecast(); // Replace with the actual method name
        }
    }
}
