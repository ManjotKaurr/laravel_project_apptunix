<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\OtpVerification;
use App\Http\Controllers\WeatherForecastController;

class AuthController extends Controller
{
    public function dashboard()
    {
        return view('welcome');
    }
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'gender' => 'required',
            'dob' => 'required|date',
        ]);
        $otp = rand(100000, 999999);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'otp' => $otp,
        ]);
        $email = $user->email;
        $oop = $user->otp;
        // Mail::to($user->email)->send(new OtpVerification($otp));

        return view('verify-otp', compact('oop', 'email'));

        // return redirect()->route('verify.otp')->with('success', 'OTP sent to your email. Please verify.');

    }



    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',

        ]);



        $user = User::where('email', $request->input('email'))->first();
        $otp = rand(100000, 999999);
        $email = $request->input('email');
        $oop = $otp;

        if ($user) {
            $user->otp = $otp;
            $user->save();
            return view('verify-otp', compact('oop', 'email'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records or email not verified.',
        ]);
    }

    public function showOtpForm()
    {
        return view('verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user || $request->input('otp') !== $user->otp) {
            return back()->withErrors([
                'otp' => 'Invalid OTP.',
            ]);
        }

        $user->is_verified = true;
        $user->save();

        return redirect()->route('weather-forecast')->with('success', 'OTP verification successful. You can now view weather.');
    }

    // public function resendOtp(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //     ]);

    //     $user = User::where('email', $request->input('email'))->first();

    //     if ($user) {
    //         $user->otp = rand(100000, 999999);
    //         $user->save();

    //         // Send the OTP to the user's phone number

    //         return back()->with('success', 'OTP has been resent.');
    //     }

    //     return back()->withErrors([
    //         'phone' => 'User not found.',
    //     ]);
    // }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
