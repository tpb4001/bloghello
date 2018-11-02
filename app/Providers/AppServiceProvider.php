<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
        // return view()->share('user', $user);
        view()->composer(['admin.*'],function($view){
            $uname = session('uname');
            $user = User::where('uname',$uname)->first();
            view()->share('user',$user);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
