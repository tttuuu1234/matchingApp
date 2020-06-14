@extends('layouts.app')

@section('content')
    <p>users</p>
    @foreach ($users as $user)
        <p>{{ $user->user_name }}</p>
    @endforeach
@endsection