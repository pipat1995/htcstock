<?php

namespace App\Providers;

use App\Repositories\AccessoriesRepository;
use App\Repositories\HistoriesRepository;
use App\Repositories\Interfaces\AccessoriesRepositoryInterface;
use App\Repositories\Interfaces\HistoriesRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
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
        $this->app->bind(AccessoriesRepositoryInterface::class, AccessoriesRepository::class);
        $this->app->bind(HistoriesRepositoryInterface::class, HistoriesRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
