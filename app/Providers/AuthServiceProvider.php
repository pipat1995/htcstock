<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('manage-users', function ($user) {
            // Gate::denies('edit-users') เรียกใช้ที่ controller จะได้ $user ที่ใช้งานอยู่
            // $user->hasRole('admin') เฉพาะ 'admin', 'author' เท่านั้น
            return $user->hasAnyRoles([ 'admin','author']);
        });

        Gate::define('edit-users', function ($user) {
            // Gate::denies('edit-users') เรียกใช้ที่ controller จะได้ $user ที่ใช้งานอยู่
            // $user->hasRole('admin') เฉพาะ 'admin', 'author', 'user' เท่านั้น
            return $user->hasAnyRoles(['admin', 'author', 'user']);
        });

        Gate::define('delete-users', function ($user) {
            // Gate::denies('delete-users') เรียกใช้ที่ controller จะได้ $user ที่ใช้งานอยู่
            // $user->hasRole('admin') เฉพาะ admin เท่านั้น
            return $user->hasRole('admin');
        });
    }
}
