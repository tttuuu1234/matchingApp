<?php

namespace App\Providers;

use App\Repositories\Profile\ProfileRepository;
use App\Repositories\Profile\ProfileRepositortInterface;
use App\Services\ProfileService;
use Illuminate\Support\ServiceProvider;

class ProfileProvicder extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProfileRepositortInterface::class,
            ProfileRepository::class
        );

        $this->app->bind(
            'ProfileService',
            ProfileService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
