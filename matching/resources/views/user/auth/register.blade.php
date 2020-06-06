@extends('layouts.app')

@section('content')
    @if ($errors->has('email') || $errors->has('password'))
        <div class="error-container text-center">
            <p class="error-message">{{ $errors->first('email') }}</p>
            <p class="error-message">{{ $errors->first('password') }}</p>
        </div>
    @endif
    <div class="container">
        <div class="form-box">
            <form action="{{ route("user.register") }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email"><span class="strong">※</span>メールアドレス</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" maxlength="255" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password"><span class="strong">※</span>パスワード</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" minlength="8" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="password-confirm"><span class="strong">※</span>パスワード確認</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" minlength="8" maxlength="20">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary form-submit">登録</button>
                </div>
            </form>
        </div>
    </div>
@endsection
