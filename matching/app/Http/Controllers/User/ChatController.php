<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\ChatService;

class ChatController extends Controller
{
    public function index()
    {
        $users = ChatService::getChatUsers();
        return view('user.chat.index', compact('users'));
    }


}
