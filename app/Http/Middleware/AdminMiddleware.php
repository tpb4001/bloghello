<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AdminMiddleware
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
        $user = User::where('uname',session('uname'))->first();
        if ($request->session()->has('uname') && $user->Identity == 1) {
            return $next($request);
        } else {
            return redirect('/admin/login')->with('error','请登录你的账号');
        }
        
    }
}
