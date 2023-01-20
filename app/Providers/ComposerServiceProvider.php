<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SettingService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        if (Schema::hasTable('settings')){
//            View::share(['settings'=>Setting::first()]);
//        }
//        if (Schema::hasTable('setting_services')){
//            View::share(['services'=>SettingService::all()]);
//        }
    }
}
