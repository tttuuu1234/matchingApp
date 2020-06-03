@extends('layouts.app')

@section('content')
    <div class="user-profile-container">
        <form action="">
            @csrf
            <div class="user-icon-box">
                {{-- <i class="fas fa-user user-icon"></i> --}}
            </div>
            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" class="form-control user-profile-form-parts" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="prefecture">都道府県</label>
                <select name="" id="prefecture" class="form-control user-profile-form-parts">
                    @foreach ($prefectures as $prefecture)
                        <option value="{{$prefecture->name}}">{{ $prefecture->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="age">年齢</label>
                <input type="text" class="form-control user-profile-form-parts" id="age" name="age">
            </div>
            <div class="form-group">
                <p class="mr-5">性別</p>
                <div class="d-flex justify-content-center">
                    <label for="man">男性</label>
                    <input type="checkbox" name="sex" id="man" class="form-control user-profile-form-checkbox w-25">
                    <label for="woman">女性</label>
                    <input type="checkbox" name="sex" id="woman" class="form-control user-profile-form-checkbox w-25">
                </div>
            </div>
            <div class="form-group">
                <label for="matching_age_from">マッチング希望年齢</label>
                <div class="d-flex">
                    <input type="text" class="form-control w-25 m-auto" id="matching_age_from" name="matching_age_from">
                    <span class="h2">~</span>
                    <input type="text" class="form-control w-25 m-auto" name="matching_age_to">    
                </div>
            </div>
            <div class="form-group">
                <label for="profile">自己アピール</label>
                <textarea name="profile" id="profile" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </form>
    </div>
@endsection