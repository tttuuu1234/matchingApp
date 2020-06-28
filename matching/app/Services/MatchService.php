<?php

namespace App\Services;

use App\Repositories\Chat\ChatRepositoryInterface;
use App\Repositories\Match\MatchRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class MatchService
{
    protected $chat_rep_if;
    protected $match_rep_if;

    public function __construct(ChatRepositoryInterface $chat_rep_if , MatchRepositoryInterface $match_rep_if)
    {
        $this->chat_rep_if = $chat_rep_if;
        $this->match_rep_if = $match_rep_if;
    }

    public function sendMatchingUsers($inputs)
    {
        // 自分自身にマッチング希望を送信した場合は弾く
        if (intval($inputs['match_reciver_id'])  === Auth::id()) {
            return;
        }

        $inputs['match_sender_id'] = Auth::id();
        $inputs['match_reciver_id'] = intval($inputs['match_reciver_id']);

        return $this->match_rep_if->sendMatching($inputs);
    }

    public function sentMatchingUsersList()
    {
        return $this->match_rep_if->sentMatchingUsersList(Auth::id());
    }

    public function reciveMatchingUsersList()
    {
        return $this->match_rep_if->reciveMatchingUsersList(Auth::id());
    }

    public function approvalMatching($request)
    {
        $macthResults = $this->match_rep_if->approvalMatching(intval($request['approval_match_id']));
        $this->chat_rep_if->createRoom($macthResults->id);

    }
}