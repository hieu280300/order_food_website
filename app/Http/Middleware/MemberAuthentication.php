<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MemberAuthentication
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

        if (Auth::check() && (Auth::user()->lever == 0||Auth::user()->lever == 1 )) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect('/member-login')->with('pleaseLogin', 'Vui lòng đăng nhập!');
        }
    }
}
