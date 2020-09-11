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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define(string,callback) กำหนดสิทธิ์ parameter1 คือ ชื่อ parameter2 คือ function return condition 
        // ตอนเรียกใช้ controller Gate::denies('for-admin-author')
        Gate::define('for-admin-author', function ($user) {
            // $user->hasRole('admin','author') True
            return $user->hasRole('admin','author');
        });

        Gate::define('for-admin', function ($user) {
            // Gate::denies('for-admin') เรียกใช้ที่ controller จะได้ $user ที่ใช้งานอยู่
            // $user->hasRole('admin') True
            return $user->hasRole('admin');
        });
    }
}
