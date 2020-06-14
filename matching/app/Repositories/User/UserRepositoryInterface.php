<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    /**
     * user一覧取得
     *
     * @return array
     */
    public function getUsers();

    /**
     * user検索
     * @param array $searchInputs
     *
     * @return void
     */
    public function searchUsers(array $serchInputs);
}