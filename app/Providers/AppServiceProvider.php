<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
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
        $settings = DB::table('settings')->first();

        // Ensure $settings is not null before sharing it with the view
        if ($settings) {
            view()->share('settings', $settings);
        }
    }
}
