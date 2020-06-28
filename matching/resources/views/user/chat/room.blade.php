@extends('layouts.app')

@section('content')
    <div class="chat-room">
        <div>
            <div class="user-icon-box">
                <i class="fas fa-user user-icon"></i>
            </div>
            <p>{{ $matchingOpponent->name }}</p>
        </div>
        @if ($chatRoomInfos['is_first_chat'] != 1)
            @for ($i = 0; $i < count($chatRoomInfos['chat_room']); $i++)
                @if ($chatRoomInfos['chat_room'][$i]->chat_sender_id === $chatRoomInfos['login_user_id'])
                    <div class="text-right">
                        <div class="my-message">
                            <div class="right-says">
                                <p>{{ $chatRoomInfos['chat_room'][$i]->message }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="opponent-message">
                        <div class="chatting">
                            <div class="left-says">
                                <p>{{ $chatRoomInfos['chat_room'][$i]->message }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
        @endif
        <div class="message-box-fixed">
            <input type="hidden" name="sender_id" id="senderId" value="{{ $chatRoomInfos['login_user_id'] }}">
            <input type="hidden" name="reciver_id" id="reciverId" value="{{ $chatRoomInfos['opponent_user_id'] }}">
            <input type="hidden" name="chat_room_id" id="chatRoomId" value="{{ $chatRoomInfos['chat_room_id'] }}">
            <input type="text" class="message-box" id="message" name="message">
            <button class="btn btn-vioret btn-message" id="sendMessage">送信</button>
        </div>
    </div>
@endsection