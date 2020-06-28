@extends('layouts.app')

@section('content')
    <ul class="chat-lists">
        @foreach ($users as $user)
            <li class="chat-list">
                <div class="user-icon-box">
                    <i class="fas fa-user user-icon"></i>
                </div>
                <div>
                    <p class="user-name">{{ $user->name }}</p>
                    <p class="message">よろしくね</p>
                </div>
                <div class="chat-submit">
                    <a href="{{ route('user.chat.room', [$user->id]) }}">
                        <button class="btn btn-vioret">chatページ</button>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
@endsection