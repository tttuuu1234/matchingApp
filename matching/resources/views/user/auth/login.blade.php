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
            <form action="{{ route("user.login") }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" maxlength="255" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" minlength="8">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary form-submit">ログイン</button>
                </div>
            </form>
        </div>
</div>
@endsection