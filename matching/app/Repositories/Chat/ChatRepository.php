<?php

namespace App\Repositories\Chat;

use App\Models\{Chat, ChatRoom, Match};

class ChatRepository implements ChatRepositoryInterface
{
    protected $chat;
    protected $chat_room;
    protected $match;

    public function __construct(Chat $chat, ChatRoom $chat_room ,Match $match)
    {
        $this->chat = $chat;
        $this->chat_room = $chat_room;
        $this->match = $match;
    }

    public function createRoom(int $matchId)
    {
        $this->chat_room->create(['match_id' => $matchId]);
    }

    public function getSenderUsers($userId)
    {
        return $this->chat_room->join('matches', function($join) {
                            $join->on('chat_rooms.match_id', 'matches.id');
                        })
                        ->join('users', function($join) use($userId) {
                            $join->on('matches.match_sender_id', 'users.id')
                            ->where('matches.match_reciver_id', $userId);
                        })
                        ->join('profiles', function($join) {
                            $join->on('matches.match_sender_id', 'profiles.id');
                        })
                        ->select(
                            'matches.id',
                            'matches.match_sender_id',
                            'matches.match_reciver_id',
                            'profiles.name'
                        )
                        ->get();
    }

    public function getReciverUsers($userId)
    {
        return $this->chat_room->join('matches', function($join) {
                            $join->on('chat_rooms.match_id', 'matches.id');
                        })
                        ->join('users', function($join) use($userId) {
                            $join->on('matches.match_reciver_id', 'users.id')
                            ->where('matches.match_sender_id', $userId);
                        })
                        ->join('profiles', function($join) {
                            $join->on('matches.match_reciver_id', 'profiles.id');
                        })
                        ->select(
                            'matches.id',
                            'matches.match_sender_id',
                            'matches.match_reciver_id',
                            'profiles.name'
                        )
                        ->get();
    }

    public function checkChat(int $matchId)
    {
        return $this->chat_room->join('chats', function($join) use($matchId){
                            $join->on('chat_rooms.id', 'chats.chat_room_id')
                            ->where('chat_rooms.match_id', $matchId);
                        })
                        ->exists();
    }

    public function getFirstChatRoom(int $matchId)
    {
        return $this->chat_room->join('matches', function($join) use($matchId) {
                            $join->on('chat_rooms.match_id', 'matches.id')
                            ->where('chat_rooms.match_id', $matchId);
                        })
                        ->select(
                            'chat_rooms.id',
                            'chat_rooms.match_id',
                            'matches.match_sender_id',
                            'matches.match_reciver_id'
                        )
                        ->get();
    }

    public function getChatRoom(int $matchId)
    {
        return $this->chat_room->join('matches', function($join) use($matchId) {
                            $join->on('chat_rooms.match_id', 'matches.id')
                            ->where('chat_rooms.match_id', $matchId);
                        })
                        ->join('chats', function($join) {
                            $join->on('chat_rooms.id', 'chats.chat_room_id');
                        })
                        ->select(
                            'chat_rooms.id',
                            'chat_rooms.match_id',
                            'matches.match_sender_id',
                            'matches.match_reciver_id',
                            'chats.sender_id as chat_sender_id',
                            'chats.reciver_id as chat_reciver_id',
                            'chats.message'
                        )
                        ->get();
    }

    public function sendMessage(array $messageContents)
    {
        return $this->chat->create([
                            'sender_id' => $messageContents['sender_id'],
                            'reciver_id' => $messageContents['reciver_id'],
                            'chat_room_id' => $messageContents['chat_room_id'],
                            'message' => $messageContents['message']
                        ]);
    }
}