@extends('layouts.app')

@section('content')
<div class="text-center">
    <div>
        <h2 class="register-title">チャットアプリ(仮)</h2>
        <div class="">
            <form action="{{ route("user.register") }}" method="POST">
                @csrf
                <div class="">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-parts" id="email" name="email" maxlength="255">
                </div>
                <div class="">
                    <label for="password">パスワード</label>
                    <input type="password" class="form-parts" id="password" name="password" minlength="8">
                </div>
                <div class="">
                    <label for="password-confirm">パスワード確認</label>
                    <input type="password" class="form-parts" id="password-confirm" name="password_confirmation" minlength="8">
                </div>
                <button type="submit">登録</button>
            </form>
        </div>    
    </div>
</div>
@endsection
