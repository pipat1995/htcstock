<?php

namespace App\Providers;

use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\Eloquent\AccessoriesRepository;
use App\Repository\Eloquent\TransactionsRepository;
use App\Repository\Eloquent\UserInfoRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\TransactionsRepositoryInterface;
use App\Repository\UserInfoRepositoryInterface;
use App\Repository\UserRepositoryInterface;
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
        $this->app->bind(TransactionsRepositoryInterface::class,TransactionsRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserInfoRepositoryInterface::class,UserInfoRepository::class);
    }
}
