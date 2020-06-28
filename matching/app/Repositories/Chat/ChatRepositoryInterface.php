<?php

namespace App\Repositories\Chat;

interface ChatRepositoryInterface
{
    /**
     * マッチング承認後にchatRoomを作成
     * @param integer $matchId
     *
     * @return void
     */
    public function createRoom(int $matchId);
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

    /**
     * chatが存在するか確認
     *
     * @param integer $matchId
     * @return boolean
     */
    public function checkChat(int $matchId);

    /**
     * chatRoomのみ取得
     *
     * @param integer $matchId
     * @return void
     */
    public function getFirstChatRoom(int $matchId);

    /**
     * chat内容とchatRoomを取得
     *
     * @param integer $matchId
     * @return void
     */
    public function getChatRoom(int $matchId);

    /**
     * 送信されたmessageの登録
     *
     * @param array $messageContents
     * @return mixed
     */
    public function sendMessage(array $messageContents);
}