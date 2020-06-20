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
     * @return void
     */
    public function searchUsers(array $serchInputs);

    /**
     * マッチング希望送信
     *
     * @param array $inputs
     * @return void
     */
    public function sendMatching(array $inputs);

    /**
     * マッチング希望送信済みのuser取得
     *
     * @return void
     */
    public function sentMatchingUsersList(int $userId);
}