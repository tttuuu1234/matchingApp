<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Log;
use App\Traits\Common;
use App\Facades\ProfileService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileValidation;


class ProfileController extends Controller
{
    use Common;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($userId)
    {
        $profile = ProfileService::getProfile($userId);

        return view('user.profile.show', compact('profile'));
    }

    public function create()
    {
        $prefectures = ProfileService::getPrefectures();
        $ages = $this->getAges();
        return view('user.profile.create', compact('prefectures', 'ages'));
    }

    public function store(ProfileValidation $request)
    {
        ProfileService::create($request->all());

        return redirect()->route('user.home');
    }

    public function edit($userId)
    {
        $profile = ProfileService::getProfile($userId);
        $prefectures = ProfileService::getPrefectures();
        $ages = $this->getAges();

        return view('user.profile.edit', compact('profile', 'prefectures', 'ages'));
    }

    public function update(ProfileValidation $request, $userId)
    {
        ProfileService::update($request->all(), $userId);

        return redirect()->route('user.home');
    }
}
