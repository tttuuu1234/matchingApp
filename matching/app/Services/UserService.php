<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $user_rep_if;

    public function __construct(UserRepositoryInterface $user_rep_if)
    {
        $this->user_rep_if = $user_rep_if;
    }

    public function getUsers()
    {
        return $this->user_rep_if->getUsers(Auth::id());
    }

    public function searchUsers($searchInputs)
    {
        // jquery側でsexに値が入っていなければ、nullをいれる制御追加したい
        if (!array_key_exists('sex', $searchInputs)){
            $searchInputs['sex'] = null;
        }

        // jquery側でfrom、toが無ければnullにする制御追加したい
        $matchingAge = $searchInputs['matching_age'];
        if (empty($matchingAge['matching_age_from']) && empty($matchingAge['matching_age_to'])) {
            $searchInputs['matching_age'] = null;
        }

        return $this->user_rep_if->searchUsers($searchInputs);
    }

    public function sendMatchingUsers($inputs)
    {
        // 自分自身にマッチング希望を送信した場合は弾く
        if (intval($inputs['match_reciver_id'])  === Auth::id()) {
            return;
        }

        $inputs['match_sender_id'] = Auth::id();
        $inputs['match_reciver_id'] = intval($inputs['match_reciver_id']);

        return $this->user_rep_if->sendMatching($inputs);
    }

    public function sentMatchingUsersList()
    {
        return $this->user_rep_if->sentMatchingUsersList(Auth::id());
    }

}