<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Traits\Common;
use App\Facades\ProfileService;

class HeaderComposer
{
    use Common;

    public function compose(View $view)
    {
        $prefectures = ProfileService::getPrefectures();
        $ages = $this->getAges();
        $view->with('prefectures', $prefectures);
        $view->with('ages', $ages);
    }
}