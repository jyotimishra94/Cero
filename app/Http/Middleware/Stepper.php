<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Stepper
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $model = \App\Models\User::with('company', 'company.clients')
                ->whereHas('company', function($query){
                    $query->where('pan_number', '<>', '');
                  
                })
                ->whereHas('company.clients', function($query){
                    $query->where('status', 1);
                })
                ->find(auth()->user()->user_id);

        if($model){
            // return redirect()->route('dashboard'); 
        }

        return $next($request);
    }
}
