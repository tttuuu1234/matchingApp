<?php

namespace App\Providers;

use App\Repositories\Chat\ChatRepositoryInterface;
use App\Repositories\Chat\ChatRepository;
use App\Services\ChatService;
use Illuminate\Support\ServiceProvider;

class ChatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ChatRepositoryInterface::class,
            ChatRepository::class
        );

        $this->app->bind(
            'ChatService',
            ChatService::class
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
