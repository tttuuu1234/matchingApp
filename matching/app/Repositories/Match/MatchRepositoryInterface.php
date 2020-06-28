<?php

namespace App\Repositories\Match;

interface MatchRepositoryInterface
{
    /**
     * マッチング希望送信
     * @param array $inputs
     *
     * @return void
     */
    public function sendMatching(array $inputs);

    /**
     * マッチング希望送信済みのuser取得
     * @param int $userId
     *
     * @return array
     */
    public function sentMatchingUsersList(int $userId);

    /**
     * マッチング希望を送信してくれたuser取得
     * @param int $userId
     *
     * @return array
     */
    public function reciveMatchingUsersList(int $userId);

    /**
     * マッチング承認
     * @param integer $approvalMatchId
     */
    public function approvalMatching(int $approvalMatchId);
}