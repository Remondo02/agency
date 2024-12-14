<?php

namespace App\Providers;

use App\Models\Picture;
use App\Models\Property;
use App\Policies\PicturePolicy;
use App\Policies\PropertyPolicy;
use App\Weather;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Weather::class, fn () => new Weather('demo'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Gate::policy(Property::class, PropertyPolicy::class);
    }
}
