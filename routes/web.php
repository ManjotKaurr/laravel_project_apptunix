<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('register');
});

use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route::get('/weather-forecast', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('/register', [AuthController::class, 'register']);
// Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/verify-otp', [AuthController::class, 'showOtpForm'])->name('verify.otp');
// Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
// Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('resend.otp');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/verify-otp', [AuthController::class, 'showOtpForm'])->name('verify-otp');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp.submit');

use App\Http\Controllers\WeatherForecastController;

// Route::middleware('jwt.auth')->get('/weather-forecast', [WeatherForecastController::class, 'getWeatherForecast']);
Route::get('/weather-forecast', [WeatherForecastController::class, 'getWeatherForecast'])->name('weather-forecast');
Route::get('/', [WeatherForecastController::class, 'getWeatherForecast']);
Route::post('/weather', [WeatherForecastController::class, 'weather']);
