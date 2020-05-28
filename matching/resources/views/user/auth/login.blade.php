@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-box">
        <form action="{{ route("user.login") }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="255">
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" minlength="8">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary form-submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection