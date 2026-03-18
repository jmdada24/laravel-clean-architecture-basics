<?php

namespace App\Providers;

use App\Domain\Contacts\Repositories\ContactRepository;
use App\Infrastructure\Persistence\Eloquent\Repositories\EloquentContactRepository;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ContactRepository::class, EloquentContactRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
