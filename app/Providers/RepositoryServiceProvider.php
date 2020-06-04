<?php

namespace App\Providers;

use App\Repositories\AccessoriesRepository;
use App\Repositories\AccessoriesRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AccessoriesRepositoryInterface::class,AccessoriesRepository::class);
    }
}
