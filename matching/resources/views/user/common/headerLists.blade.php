@auth
<ul class="user-header-lists">
    <li class="user-header-list">
        <a href="#">タイムライン</a>
    </li>
    <li class="user-header-list">
        <a href="{{ route('user.index') }}">会員一覧</a>
    </li>
    <li class="user-header-list">
        <a href="{{ route('user.chat.index') }}">チャット</a>
    </li>
    <li class="user-headre-list">
        <a href="{{ route('user.match.recive') }}">マッチング希望一覧</a>
    </li>
</ul>
@endauth
