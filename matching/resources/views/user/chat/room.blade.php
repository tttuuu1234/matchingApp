@extends('layouts.chat')

@section('content')
    <div class="chat-room">
        <div class="chat-header">
            <div class="chat-back">
                <a href="{{ route('user.chat.index') }}">
                    <button class="btn btn-vioret chat-back-btn"><-</button>
                </a>
            </div>
            {{-- <div class="user-icon-box">
                <i class="fas fa-user user-icon"></i>
            </div> --}}
            <p class="mb-0 ml-3">{{ $matchingOpponent->name }}</p>
        </div>
        <div class="chat-contents">
            @if ($chatRoomInfos['is_first_chat'] != 1)
                @for ($i = 0; $i < count($chatRoomInfos['chat_room']); $i++)
                    @if ($chatRoomInfos['chat_room'][$i]->chat_sender_id === $chatRoomInfos['login_user_id'])
                        <div class="my-message text-right mb-3">
                            <p class="message">{{ $chatRoomInfos['chat_room'][$i]->message }}</p>
                        </div>
                    @else
                        <div class="opponent-message mb-3">
                            <p class="message">{{ $chatRoomInfos['chat_room'][$i]->message }}</p>
                        </div>
                    @endif
                @endfor
            @endif
        </div>
        <div class="message-contents">
            <input type="hidden" name="sender_id" id="senderId" value="{{ $chatRoomInfos['login_user_id'] }}">
            <input type="hidden" name="reciver_id" id="reciverId" value="{{ $chatRoomInfos['opponent_user_id'] }}">
            <input type="hidden" name="chat_room_id" id="chatRoomId" value="{{ $chatRoomInfos['chat_room_id'] }}">
            <input type="text" class="message-box" id="message" name="message">
            <input type="file" name="picture" id="picture">
            <button class="btn btn-vioret" id="sendMessage">送信</button>
        </div>
    </div>
@endsection