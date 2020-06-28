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
                    <div class="d-flex justify-content-between">
                        <div class="user-matching">
                            <input type="hidden" name="approval_match_id" value="{{ $user->match_id }}" id="matchUserApproval{{ $user->macth_sender_id }}">
                            <button class="btn btn-vioret w-auto btn-match-approval">承認</button>
                            <input type="hidden" name="approval" value="0" id="matchUserRefusal{{ $user->macth_sender_id }}">
                            <button class="btn btn-vioret w-auto btn-match-refusal">拒否</button>
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