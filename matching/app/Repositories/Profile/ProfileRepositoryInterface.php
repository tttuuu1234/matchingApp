<?php

namespace App\Repositories\Profile;

interface ProfileRepositortInterface
{

    /**
     * profile取得
     * @param integer $userId
     *
     * @return object
     */
    public function getProfile($userId);

    /**
     * profile作成
     * @param array $inputs
     */
    public function create($inputs);

    /**
     * profile更新
     * @param array $inputs
     * @param integer $userId
     */
    public function update($inputs, $userId);

}