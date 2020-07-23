<?php

namespace App\Providers;

use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\BudgetRepositoryInterface;
use App\Repository\Eloquent\AccessoriesRepository;
use App\Repository\Eloquent\BudgetRepository;
use App\Repository\Eloquent\RolesRepository;
use App\Repository\Eloquent\SystemRepository;
use App\Repository\Eloquent\TransactionsRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\RolesRepositoryInterface;
use App\Repository\SystemRepositoryInterface;
use App\Repository\TransactionsRepositoryInterface;
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
        $this->app->bind(BudgetRepositoryInterface::class,BudgetRepository::class);
        $this->app->bind(RolesRepositoryInterface::class,RolesRepository::class);
        $this->app->bind(SystemRepositoryInterface::class,SystemRepository::class);
    }
}
