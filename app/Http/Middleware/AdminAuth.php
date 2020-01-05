<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->get('token')){
            return $next($request);
        }else{
            return redirect('login');
        }
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                return $next($request);
            }
            else{
                Auth::logout();
                return redirect("login")->with('error', 'wrong username or password!');;
            }
        } else {
            return redirect('login');
        }
    }
}
