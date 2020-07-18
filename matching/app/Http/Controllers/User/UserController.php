<?php

namespace App\Http\Controllers\User;

use App\Facades\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = UserService::getUsers();

        return view('user.index', compact('users'));
    }

    public function search(Request $request)
    {
        $users = UserService::searchUsers($request->all());

        return response()->json($users);
    }
}
