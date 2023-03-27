<?php

namespace App\Providers;

use App\Repositories\Orders\IOrdersRepository;
use App\Repositories\Orders\OrdersRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(IOrdersRepository::class, OrdersRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
