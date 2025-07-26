<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;


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
        // Load helper functions
        require_once app_path('helpers.php');

        // Register observers
        \App\Models\Setting::observe(\App\Observers\SettingObserver::class);
        \App\Models\WebDesign::observe(\App\Observers\WebDesignObserver::class);
        \App\Models\MenuItem::observe(\App\Observers\MenuItemObserver::class);

        // Livewire::setScriptRoute(function ($handle) {
        //     return Route::get('/NhaBepAAA/livewire/livewire.min.js?id=13b7c601', $handle);
        // });

        // Livewire::setUpdateRoute(function ($handle) {
        //     return Route::post('/NhaBepAAA/livewire/update', $handle);
        // });

    }
}
