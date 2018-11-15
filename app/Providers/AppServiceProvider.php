<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Http\Controllers\Admin\CatesController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //全局保存用户登录信息
        view()->composer(['admin.*'] ,function($view) {
            $uname = session('uname');
            $Account = User::where('uname' ,$uname)->first();
            view()->share('account' ,$Account);
        });
        //共享分类数据
        view()->share('common_cates_data',CatesController::getPidCates(0));
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
