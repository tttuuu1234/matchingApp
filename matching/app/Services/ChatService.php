<?php

namespace App\Services;

use App\Repositories\Chat\ChatRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ChatService
{
    protected $chat_rep_if;

    public function __construct(ChatRepositoryInterface $chat_rep_if)
    {
        $this->chat_rep_if = $chat_rep_if;
    }

    public function getChatUsers()
    {
        $userId = Auth::id();

        $matchSender = $this->chat_rep_if->getSenderUsers($userId);
        $matchReciver = $this->chat_rep_if->getReciverUsers($userId);

        $collection = $matchSender->merge($matchReciver);

        return $collection;
    }
}