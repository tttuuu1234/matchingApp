<?php

namespace App\Repositories\Profile;

use phpDocumentor\Reflection\Types\Integer;

interface ProfileRepositortInterface
{

    /**
     * profile取得
     * @param string $userId
     *
     * @return object
     */
    public function getProfile(string $userId);

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

}