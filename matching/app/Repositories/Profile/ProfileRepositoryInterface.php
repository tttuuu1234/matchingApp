<?php

namespace App\Repositories\Profile;

use phpDocumentor\Reflection\Types\Integer;

interface ProfileRepositoryInterface
{

    /**
     * profile取得
     * @param string $userId
     *
     * @return object
     */
    public function getProfile(int $userId);

    /**
     * profile作成
     * @param array $inputs
     */
    public function create(array $inputs);

    /**
     * profile更新
     * @param array $inputs
     * @param string $userId
     */
    public function update(array $inputs, string $userId);

    /**
     * loginしているuserがマッチング希望を送信した、もしくは送信された相手の情報を取得
     *
     * @param integer $userId
     * @return Illuminate\Support\Collection
     */
    public function getMatchingUserProfile(int $userId);
}