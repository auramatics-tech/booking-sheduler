<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdminApprove
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

        $active = auth()->user()->status;
        if ($active == 'active') {
            $active_status = false;
        } else {
            $active_status = true;
        }
        if (Auth::user() &&  auth()->user()->hasRole('Teacher')  &&  $active_status) {
            return redirect('adminapprove')->with('error', 'You have not admin access');
        }


        return $next($request);
    }
}
