<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('frontend.body.header', function ($view) {
            $settings = Setting::all();
            $view->with('settings', $settings);
        });
        View::composer('frontend.body.footer', function ($view) {
            $settings = Setting::all();
            $view->with('settings', $settings);
        });
        View::composer('frontend.home_master', function ($view) {
            $settings = Setting::all();
            $view->with('settings', $settings);
        });
    }
}
