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

    public function show($id)
    {
        $profile = ProfileService::getProfile($id);

        return view('user.show', compact('profile'));
    }

    public function create()
    {
        $prefectures = ProfileService::getPrefectures();
        $ages = $this->getAges();
        return view('user.profile', compact('prefectures', 'ages'));
    }

    public function store(ProfileValidation $request)
    {
        ProfileService::create($request->all());

        return redirect()->route('user.home');
    }

    public function edit($id)
    {
        $profile = ProfileService::getProfile($id);
        $prefectures = ProfileService::getPrefectures();
        $ages = $this->getAges();

        return view('user.edit', compact('profile', 'prefectures', 'ages'));
    }

    public function update(ProfileValidation $request, $id)
    {
        ProfileService::update($request->all(), $id);

        return redirect()->route('user.home');
    }
}
