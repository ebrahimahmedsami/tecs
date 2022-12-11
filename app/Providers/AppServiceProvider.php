<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
//use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application vendorSetting.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application vendorSetting.
     *
     * @return void
     */
    public function boot()
    {
//        View::share('lang',app()->getLocale());
        Schema::defaultStringLength(191);
    }
}
