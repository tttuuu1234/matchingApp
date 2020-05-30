<header class="user-header">
    <h1>トッチャー</h1>
    <div>
        @guest
            <nav class="d-flex">
                <p class="mr-5">
                    <a href="{{ route('user.login.form') }}">ログイン</a>
                </p>
                <p>
                    <a href="{{ route('user.register.form') }}">新規登録</a>
                </p>
            </nav>
        @endguest
        @auth
            <a href="{{ route('user.logout') }}">ログアウト</a>
        @endauth
    </div>
</header>
