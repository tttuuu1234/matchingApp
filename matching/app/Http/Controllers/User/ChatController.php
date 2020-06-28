<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\ChatService;
use App\Facades\ProfileService;

class ChatController extends Controller
{
    public function index()
    {
        $users = ChatService::getChatUsers();
        return view('user.chat.index', compact('users'));
    }

    public function getChatRoom($matchId)
    {
        $chatRoomInfos = ChatService::getChatRoom($matchId);
        // dd(count($chatRoomInfos['chat_room']));
        $matchingOpponent = ProfileService::getMatchingOpponent($chatRoomInfos['chat_room'][0]);

        return view('user.chat.room', compact('chatRoomInfos', 'matchingOpponent'));
    }

    public function sendMessage(Request $request)
    {
        ChatService::sendMessage($request->all());
    }


}
