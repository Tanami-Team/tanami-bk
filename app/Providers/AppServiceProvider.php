<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        $languages = ['ar', 'en'];
        $lang = request()->header('lang');

        if ($lang) {
            if (in_array($lang, $languages)) {
                App::setLocale($lang);
            } else {
                App::setLocale('ar');
            }
        }
    }
}
