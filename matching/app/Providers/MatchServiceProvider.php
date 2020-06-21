<?php

namespace App\Providers;

use App\Repositories\Match\MatchRepository;
use App\Repositories\Match\MatchRepositoryInterface;
use App\Services\MatchService;
use Illuminate\Support\ServiceProvider;

class MatchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            MatchRepositoryInterface::class,
            MatchRepository::class
        );

        $this->app->bind(
            'MatchService',
            MatchService::class
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
