<?php

namespace App\Providers;

use App\Repositories\Orders\IOrdersRepository;
use App\Repositories\Orders\OrdersRepository;
use App\Repositories\Tmx\ITmxRepository;
use App\Repositories\Tmx\TmxRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(IOrdersRepository::class, OrdersRepository::class);
        $this->app->bind(ITmxRepository::class, TmxRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
