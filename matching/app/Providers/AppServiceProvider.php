<?php

namespace App\Providers;

use App\Repositories\Prefecture\PrefectureRepository;
use App\Repositories\Prefecture\PrefectureRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PrefectureRepositoryInterface::class,
            PrefectureRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
