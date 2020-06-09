<?php

namespace App\Providers;

use App\Repositories\AccessoriesRepository;
use App\Repositories\Interfaces\AccessoriesRepositoryInterface;
use App\Repositories\Interfaces\LendRepositoryInterface;
use App\Repositories\Interfaces\TakeRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\LendRepository;
use App\Repositories\TakeRepository;
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
        $this->app->bind(TakeRepositoryInterface::class, TakeRepository::class);
        $this->app->bind(LendRepositoryInterface::class, LendRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
