<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use App\Services\UserService;
use App\Services\Impl\UserServiceImpl;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        UserService::class => UserServiceImpl::class
    ];

    public function provides() : array
    {
        return [UserService::class];
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
