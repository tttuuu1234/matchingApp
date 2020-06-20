@extends('layouts.app')

@section('content')
    <div class="users-container" id="usersContainer">
        <ul class="user-lists" id="usersBox">
            @foreach ($users as $user)
                <li class="user-list">
                    <div class="d-flex">
                        <div class="user-icon-box">
                            <i class="fas fa-user user-icon"></i>
                        </div>
                        <div>
                            <div class="d-flex">
                                <p class="user-name">{{ $user->user_name }}</p>
                                <p class="user-age ml-2">{{ $user->age }}</p>
                                <p class="user-prefecture ml-2">{{ $user->prefecture_name }}</p>
                            </div>
                            <div>
                                <p class="user-profile">{{ $user->profile }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="user-report">
                            <button class="btn btn-danger">通報</button>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection