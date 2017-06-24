<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Support\Facades\Schema;
use Auth;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
   public function boot()
    {
        view()->composer('*', function($view){
            if(Auth::check()){
                $user= Auth::User();
                $roles = $user->roles->first()->name;  
                $view->with(['authUser' => Auth::User(),'userType' => $roles]);
            }   
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
