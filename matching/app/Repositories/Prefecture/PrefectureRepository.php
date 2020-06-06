<?php

namespace App\Repositories\Prefecture;

use App\Models\Prefecture;

class PrefectureRepository implements PrefectureRepositoryInterface
{
    public function getPrefectures()
    {
        $prefecture = new Prefecture();
        $prefectures = $prefecture->all();

        return $prefectures;
    }
}