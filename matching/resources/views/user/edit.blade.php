@extends('layouts.app')

@section('content')
    @if ($errors->has('name') || $errors->has('prefecture') || $errors->has('age') || $errors->has('sex') || $errors->has('matching_age_from') || $errors->has('matching_age_to'))
        <div class="error-container text-center mt-5">
            <p class="error-message">{{ $errors->first('name') }}</p>
            <p class="error-message">{{ $errors->first('prefecture') }}</p>
            <p class="error-message">{{ $errors->first('age') }}</p>
            <p class="error-message">{{ $errors->first('sex') }}</p>
            <p class="error-message">{{ $errors->first('matching_age_from') }}</p>
            <p class="error-message">{{ $errors->first('matching_age_to') }}</p>
            <p class="error-message">{{ $errors->first('profile') }}</p>
        </div>
    @endif

    <div class="user-profile-container">
        <form action="{{ route('user.profile', [$profile->user_id]) }}" method="POST">
            @method('put')
            @csrf
            <div class="user-icon-box">
                {{-- <i class="fas fa-user user-icon"></i> --}}
            </div>
            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" class="form-control user-profile-form-parts @error('name') is-invalid @enderror" name="name" id="name" value="{{ $profile->name }}">
            </div>
            <div class="form-group">
                <label for="prefecture">都道府県</label>
                <select class="form-control user-profile-form-parts @error('prefecture') is-invalid @enderror" name="prefecture" id="prefecture">
                    <option value="">-</option>
                    @foreach ($prefectures as $prefecture)
                        @if ($profile->prefecture_id === $prefecture->id)
                            <option value="{{$prefecture->id}}" selected>{{ $prefecture->name }}</option>
                        @endif
                        <option value="{{$prefecture->id}}">{{ $prefecture->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="age">年齢</label>
                <select class="form-control user-profile-form-parts @error('age') is-invalid @enderror" name="age" id="age">
                    <option value="">-</option>
                    @foreach ($ages as $age)
                        @if ($profile->age === $age['age'])
                            <option value="{{ $age['age'] }}" selected>{{ $age['age'] }}</option>
                        @endif
                        <option value="{{ $age['age'] }}">{{ $age['age'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <p class="mr-5">性別</p>
                <div class="d-flex justify-content-center">
                    <label for="man">男性</label>
                    @if ($profile->sex === 1)
                        <input type="checkbox" class="form-control user-profile-form-checkbox w-25 @error('sex') is-invalid @enderror" name="sex" id="man" value="1" checked>
                    @else
                        <input type="checkbox" class="form-control user-profile-form-checkbox w-25 @error('sex') is-invalid @enderror" name="sex" id="man" value="1">
                    @endif

                    <label for="woman">女性</label>
                    @if ($profile->sex === 2)
                        <input type="checkbox" class="form-control user-profile-form-checkbox w-25" name="sex" id="woman" value="2" checked>
                    @else
                        <input type="checkbox" class="form-control user-profile-form-checkbox w-25" name="sex" id="woman" value="2">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="matching_age_from">マッチング希望年齢</label>
                <div class="d-flex">
                    <select class="form-control user-profile-form-parts @error('matching_age_from') is-invalid @enderror" id="matching_age_from" name="matching_age_from">
                        <option value="">-</option>
                        @foreach ($ages as $age)
                            @if ($profile->matching_age_from === $age['age'])
                                <option value="{{ $age['age'] }}" selected>{{ $age['age'] }}</option>
                            @endif
                            <option value="{{ $age['age'] }}">{{ $age['age'] }}</option>
                        @endforeach
                    </select>
                    <span class="h2">~</span>
                    <select class="form-control user-profile-form-parts @error('matching_age_to') is-invalid @enderror" name="matching_age_to">
                        <option value="">-</option>
                        @foreach ($ages as $age)
                            @if ($profile->matching_age_to === $age['age'])
                                <option value="{{ $age['age'] }}" selected>{{ $age['age'] }}</option>
                            @endif
                            <option value="{{ $age['age'] }}">{{ $age['age'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="profile">自己アピール</label>
                <textarea class="form-control @error('profile') is-invalid @enderror" name="profile" id="profile" cols="30" rows="10" >{{ $profile->profile }}</textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </form>
    </div>
@endsection