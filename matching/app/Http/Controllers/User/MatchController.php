<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\MatchService;

class MatchController extends Controller
{
    public function sendMatching(Request $request)
    {
        $matching = MatchService::sendMatchingUsers($request->all());

        return response()->json($matching);
    }

    public function sentMatchingUsersList()
    {
        $users = MatchService::sentMatchingUsersList();

        return view('user.match.sender', compact('users'));
    }

    public function reciveMatchingUsersList()
    {
        $users = MatchService::reciveMatchingUsersList();

        return view('user.match.reciver', compact('users'));
    }

    public function approvalMatching(Request $request)
    {
        MatchService::approvalMatching($request->all());
    }

}
