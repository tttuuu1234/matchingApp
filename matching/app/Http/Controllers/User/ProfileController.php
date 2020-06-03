<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prefecture;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPrefectures()
    {
        $prefecture = new Prefecture();
        $prefectures = $prefecture->all();

        return $prefectures;
    }

    public function index()
    {
        $prefectures = $this->getPrefectures();
        return view('user.profile', compact('prefectures'));
    }

    public function store()
    {
        
    }


}
