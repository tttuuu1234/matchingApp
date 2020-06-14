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
                                <p class="user-age">{{ $user->age }}</p>
                                <p class="user-prefecture">{{ $user->prefecture_name }}</p>
                            </div>
                            <div class="">
                                <p class="user-profile">{{ $user->profile }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="user-matching">
                            <button class="btn btn-vioret w-auto">マッチング希望</button>
                        </div>
                        <div class="user-report">
                            <button class="btn btn-danger">通報</button>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection