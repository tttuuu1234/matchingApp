<?php

namespace App\Repositories\Prefecture;

interface PrefectureRepositoryInterface
{
    /**
     * 都道府県取得
     *
     * @return array
     */
    public function getPrefectures();
}