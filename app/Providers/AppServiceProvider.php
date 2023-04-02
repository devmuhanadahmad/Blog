<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        $settings=Setting::checkSetting();
        view()->share([
            'setting'=>$settings,
        ]);
        */

        $settings = Cache::get('app-settings');
        if (!$settings) {
            //dd($settings);
            $settings = Config::all();
            Cache::put('app-settings', $settings);
        }

        foreach ($settings as $config) {
            config()->set($config->name, $config->value);
        }

        //config('app.currency');
    }
}
