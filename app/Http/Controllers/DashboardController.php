<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function dashboard()
    {
        $user = Auth::user();
            if ($user['user_type_id'] == 1) {
                 
                 return view('auth.ceroadmindashboard');
                 
            } elseif ($user['user_type_id'] == 2) {
                 return view('auth.serviceproviderdashboard');
                
            } elseif ($user['user_type_id'] == 3) {
               return view('auth.buyerdashboard');
               
            }
    }
   
    
}
