<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Webhook
use App\Repositories\ConcreteClasses\WebhookRepository;
use App\Repositories\Interfaces\WebhookRepositoryInterface;

// Log
use App\Repositories\ConcreteClasses\LogRepository;
use App\Repositories\Interfaces\LogRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Solid principle (Dependency Inversion Principle)
         */
        $this->app->bind(WebhookRepositoryInterface::class, WebhookRepository::class);
        $this->app->bind(LogRepositoryInterface::class, LogRepository::class);
    }
}
