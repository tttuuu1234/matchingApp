<?php

namespace App\Http\Controllers\User;

use App\Facades\ProfileService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Common;

class UserController extends Controller
{
    use Common;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showSearchForm()
    {
        $prefectures =  ProfileService::getPrefectures();
        $ages = $this->getAges();
        return view('user.search', compact('prefectures', 'ages'));
    }

    public function searchUser()
    {

    }
}
