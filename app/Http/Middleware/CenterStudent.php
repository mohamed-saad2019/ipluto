<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CenterStudent
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
        if(Auth::User()->role == "user")
        {
            $count = \DB::table('instructor_students')->where('student_id',\Auth::user()->id)->count();

            if ($count > 0) {
                 return $next($request);  
            }
            else
            {
               return redirect(url(''));
            }
        }
        else{
               return redirect(url(''));
        }
    }
}
