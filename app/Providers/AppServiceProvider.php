<?php

namespace App\Providers;

use App\Listeners\ContactEventSubscriber;
use App\Models\Property;
use App\Policies\PropertyPolicy;
use App\Weather;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->singleton(Weather::class, fn() => new Weather('demo'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        JsonResource::withoutWrapping();
        Gate::policy(Property::class, PropertyPolicy::class);

        // Manually Registering Events (no need by default)
        // Event::listen(
        //     ContactRequestEvent::class,
        //     ContactListener::class,
        // );

        Event::subscribe(ContactEventSubscriber::class);
    }
}
