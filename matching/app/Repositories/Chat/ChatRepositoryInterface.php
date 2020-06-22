<?php

namespace App\Repositories\Chat;

interface ChatRepositoryInterface
{
    /**
     * マッチング承認されたuser一覧取得
     *
     * @return Illuminate\Support\Collection
     */
    public function getSenderUsers(int $userId);

    /**
     * マッチング承認したuser一覧取得
     *
     * @param integer $userId
     * @return Illuminate\Support\Collection
     */
    public function getReciverUsers(int $userId);
}