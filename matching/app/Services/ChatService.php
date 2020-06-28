<?php

namespace App\Services;

use App\Repositories\Chat\ChatRepositoryInterface;
use App\Repositories\Profile\ProfileRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ChatService
{
    protected $chat_rep_if;
    protected $profile_rep_if;

    public function __construct(ProfileRepositoryInterface $profile_rep_if, ChatRepositoryInterface $chat_rep_if)
    {
        $this->chat_rep_if = $chat_rep_if;
        $this->profile_rep_if = $profile_rep_if;
    }

    public function getChatUsers()
    {
        $userId = Auth::id();

        $matchSender = $this->chat_rep_if->getSenderUsers($userId);
        $matchReciver = $this->chat_rep_if->getReciverUsers($userId);

        $collection = $matchSender->merge($matchReciver);

        return $collection;
    }

    public function getChatRoom($matchId)
    {
        $result = $this->chat_rep_if->checkChat($matchId);

        if ($result) {
            // messageのやりとりが開始していない初めてのchatRoom
            $chatRoom = $this->chat_rep_if->getChatRoom($matchId);
            $isFirstChat = 0;
        } else {
            // messageのやりとりが開始しているchatRoom
            $chatRoom = $this->chat_rep_if->getFirstChatRoom($matchId);
            $isFirstChat = 1;
        }

        $chatDetails = $chatRoom[0];
        $loginUserId = Auth::id();

        // messageの受け取り相手のidを取得
        if ($chatDetails['match_sender_id'] === $loginUserId) {
            $opponentUserId = $chatDetails['match_reciver_id'];
        } else {
            $opponentUserId = $chatDetails['match_sender_id'];
        }

        $chatRoomInfos = [
            'chat_room' => $chatRoom,
            'is_first_chat' => $isFirstChat,
            'login_user_id' => $loginUserId,
            'opponent_user_id' => $opponentUserId,
            'chat_room_id' => $chatDetails['id']
        ];

        return $chatRoomInfos;
    }

    public function sendMessage($messageContents)
    {
        return $this->chat_rep_if->sendMessage($messageContents);
    }
}