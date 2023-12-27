<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Http\Response;
use RealRashid\SweatAlert\Facades\Alert;
use App\Models\UserVerify;
use App\Models\verifytoken;
use App\Models\Company;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

use App\Models\ClientExperience;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\ServiceCategory;
use App\Models\ProductCategory;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function resendOtp(Request $request)
    {
        $token = rand(10, 100) . '2022';
        $session = session();
        $session->put('token_at_the_time_of_login', $token);
        $email = $request->input('email');
        $newToken = new verifytoken();
        $newToken->email = $email;
        $newToken->token = $token;
        $newToken->save();
        $data = [
            'token' => $token,
        ];
        Mail::to($email)->send(new WelcomeMail($data));
    }
    
    public function sendOTP(Request $request)
    {
        $token = rand(10, 100) . '2022';
        $session = session();
        $session->put('token_at_the_time_of_login', $token);
        $email = $request->input('email');
        $newToken = new verifytoken();
        $newToken->email = $email;
        $newToken->token = $token;
        $newToken->save();
        $data = [
            'token' => $token,
        ];
        Mail::to($email)->send(new WelcomeMail($data));
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],

        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user['user_type_id'] == 1) {
                return redirect()->route('dashboard');
            } elseif ($user['user_type_id'] == 2) {
                if ($user['is_email_verified'] == 1) {
                    return redirect()->route('addCompany');
                } else {
                    $this->sendOTP($request);
                    Auth::logout();
                    return redirect()->route('verifyEmail')->with('message', 'Account not verified. We have sent a new OTP to your email.');
                }
            } elseif ($user['user_type_id'] == 3) {
                if ($user['is_email_verified'] == 1) {
                    return redirect()->route('addSurvey');
                } 
                else {
                    $this->sendOTP($request);
                    Auth::logout();
                    return redirect()->route('verifyEmail')->with('message', 'Account not verified. We have sent a new OTP to your email.');
                }
            }
        }

        return redirect()->to('/')->withErrors(trans('auth.failed'));
    }

    
}
