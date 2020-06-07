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
        <div class="user-header-contents">
            <div class="user-header-search" id="modal-open">
                <i class="fas fa-search search-icon"></i>
            </div>
            <div class="modal" id="modal">
                <div class="modal-bg" id="modal-bg-close"></div>
                <div class="modal-contents">
                    <div class="user-form-search-container">
                        <div class="user-back-color modal-header text-white">
                            <div class="modal-close" id="modal-close">×</div>
                            <h3 class="py-3 mb-0">会員検索</h3>
                        </div>
                        <div class="p-3">
                            <form action="{{ route('user.search') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="prefecture">都道府県</label>
                                    <select class="form-control user-form-parts @error('prefecture') is-invalid @enderror" name="prefecture" id="prefecture">
                                        <option value="">-</option>
                                        @foreach ($prefectures as $prefecture)
                                            <option value="{{$prefecture->id}}">{{ $prefecture->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <p class="mr-5">性別</p>
                                    <div class="d-flex justify-content-center">
                                        <label for="man">男性</label>
                                        <input type="checkbox" class="form-control user-form-checkbox w-25 @error('sex') is-invalid @enderror" name="sex" id="man" value="1" >
                                        <label for="woman">女性</label>
                                        <input type="checkbox" class="form-control user-form-checkbox w-25" name="sex" id="woman" value="2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="matching_age_from">マッチング希望年齢</label>
                                    <div class="d-flex">
                                        <select class="form-control user-form-parts @error('matching_age_from') is-invalid @enderror" id="matching_age_from" name="matching_age_from">
                                            <option value="">-</option>
                                            @foreach ($ages as $age)
                                                <option value="{{ $age['age'] }}">{{ $age['age'] }}</option>
                                            @endforeach
                                        </select>
                                        <span class="h2">~</span>
                                        <select class="form-control user-form-parts @error('matching_age_to') is-invalid @enderror" name="matching_age_to">
                                            <option value="">-</option>
                                            @foreach ($ages as $age)
                                                <option value="{{ $age['age'] }}">{{ $age['age'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-vioret">検索</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="profile">
                <div class="user-header-profile">
                    <i class="fas fa-user profile-icon"></i>
                </div>
                <ul class="dropdown-lists">
                    <li class="dropdown-list"><a href="{{ route('user.logout') }}">ログアウト</a></li>
                    <li class="dropdown-list"><a href="{{ route('user.profile.show',[Auth::id()]) }}">プロフィール</a></li>
                </ul>
            </div>
        </div>
        @endauth
    </div>
</header>
