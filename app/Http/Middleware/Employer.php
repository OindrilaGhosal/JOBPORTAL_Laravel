<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Employer
{
    public function handle($request, Closure $next) {
        if(Auth::check() && Auth::user()->user_type == 'employer') {
            return $next($request);
        }else {
            return redirect('/login');
        }
    }
}

