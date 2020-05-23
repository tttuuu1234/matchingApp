@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2 class="login-title">チャットアプリ(仮)</h2>
    <div class="">
        <form action="{{ route("user.login") }}" method="POST">
            @csrf
            <div class="">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-parts" id="email" name="email" maxlength="255">
            </div>
            <div class="">
                <label for="password">パスワード</label>
                <input type="password" class="form-parts" id="password" name="password" minlength="8">
            </div>
            <button type="submit">ログイン</button>
        </form>
    </div>
</div>
@endsection