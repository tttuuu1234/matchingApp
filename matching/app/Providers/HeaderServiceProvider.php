<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HeaderServiceProvider extends ServiceProvider
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
        // ページで共通に使用しているheader(検索モーダル)にデータを渡している
        // viewにデータを渡すロジックはHeaderComposerhファイル内にある
        //  composeメソッドが発火するようになっている
        View::composer('user.common.header','App\Http\Composers\HeaderComposer');
    }
}
