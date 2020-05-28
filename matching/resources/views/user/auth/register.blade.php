@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-box">
        <form action="{{ route("user.register") }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="255">
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" minlength="8">
            </div>
            <div class="form-group">
                <label for="password-confirm">パスワード確認</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" minlength="8">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary form-submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection
