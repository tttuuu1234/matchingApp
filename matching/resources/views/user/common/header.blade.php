<header class="user-header">
    <h1>
        <a href="{{ route('user.home') }}">トッチャー</a>
    </h1>
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
        <div id="profile">
            <div class="user-header-profile">
                <i class="fas fa-user profile-icon"></i>
            </div>
            <ul class="dropdown-lists">
                <li class="dropdown-list"><a href="{{ route('user.logout') }}">ログアウト</a></li>
                <li class="dropdown-list"><a href="{{ route('user.profile.show',[Auth::id()]) }}">プロフィール</a></li>
            </ul>
        </div>
        @endauth
    </div>
</header>
