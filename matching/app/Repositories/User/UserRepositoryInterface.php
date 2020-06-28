<?php

namespace App\Repositories\User;

use phpDocumentor\Reflection\Types\Integer;

interface UserRepositoryInterface
{
    /**
     * ログインしている自分以外のuser一覧取得
     *
     * @return array
     */
    public function getUsers(int $userId);

    /**
     * user検索
     * @param array $searchInputs
     *
     * @return array
     */
    public function searchUsers(array $serchInputs);
}