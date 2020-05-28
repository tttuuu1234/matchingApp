<header class="user-header">
    <h1>トッチャー</h1>
    <div>
        @guest
            <a href="{{ route('user.login.form') }}">ログイン</a>
            <a href="{{ route('user.register.form') }}">登録</a>
        @endguest
        @auth
            <a href="{{ route('user.logout') }}">ログアウト</a>
        @endauth
    </div>
</header>
