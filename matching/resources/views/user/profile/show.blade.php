@extends('layouts.app')

@section('content')
    <div class="">
        @if (isset($profile['unknown']))
            <p>{{ $profile['unknown'] }}</p>
            <a href="{{ route('user.profile.create') }}">profile作成</a>
        @else
            <div class="">
                <p>{{ $profile->name }}</p>
            </div>
            <div class="d-flex">
                <p>{{ $profile->prefecture->name }}</p>
                <p>{{ $profile->age }}</p>
            </div>
            <div class="">
                <p>{{ $profile->profile }}</p>
            </div>
            <a href="{{ route('user.profile.edit', [$profile->user_id]) }}">profile更新</a>
        @endif
    </div>
@endsection