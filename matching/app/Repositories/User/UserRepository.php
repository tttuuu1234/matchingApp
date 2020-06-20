<?php

namespace App\Repositories\User;

use App\Models\{Match, User};
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    protected $match;
    protected $user;

    public function __construct(Match $match, User $user)
    {
        $this->match = $match;
        $this->user = $user;
    }

    public function getUsers($userId)
    {
        // profileを作成していないuserは取得されないように
        return $this->user->join('profiles as pf', function($join) use($userId) {
                            $join->on('users.id', 'pf.user_id')
                            ->where('users.id', '<>', $userId);
                        })
                        ->join('prefectures as pc', function($join) {
                            $join->on('pc.id', 'pf.prefecture_id');
                        })
                        ->select(
                            'users.id',
                            'pf.name as user_name',
                            'pf.age',
                            'pf.profile',
                            'pc.name as prefecture_name'
                        )
                        ->get();
    }

    public function searchUsers($searchInputs)
    {
        return $this->user->join('profiles as pf', function($join) use($searchInputs) {
                        $join->on('users.id', '=', 'pf.user_id')
                            ->when($searchInputs['sex'], function($query, $sex) {
                                return $query->where('pf.sex', $sex);
                            })
                            ->when($searchInputs['matching_age'], function($query, $matchingAge) {
                                return $query->whereBetween('age',[$matchingAge['matching_age_from'], $matchingAge['matching_age_to']]);
                            });
                        })
                        ->join('prefectures as pc', function($join) use($searchInputs) {
                            $join->on('pc.id', '=', 'pf.prefecture_id')
                                ->when($searchInputs['prefecture'], function($query, $prefectureId) {
                                    return $query->where('pc.id', $prefectureId);
                                });
                        })
                        ->select(
                            'users.id',
                            'pf.name as user_name',
                            'pf.age',
                            'pf.profile',
                            'pc.name as prefecture_name'
                        )
                        ->get();
    }

    public function sendMatching($inputs)
    {
        return $this->match->create([
            'match_sender_id' => $inputs['match_sender_id'],
            'match_reciver_id' => $inputs['match_reciver_id']
        ]);
    }

    public function sentMatchingUsersList($userId)
    {
        return $this->match->join('users', function($join) use($userId) {
                        $join->on('users.id', 'matches.match_sender_id')
                        // マッチング送信したログインユーザーのidで絞る
                        ->where('matches.match_sender_id', $userId);
                    })
                    ->join('profiles as pf', function($join) {
                        // マッチング送信されたユーザーのidとプロフィールのid結合
                        $join->on('matches.match_reciver_id', 'pf.user_id');
                    })
                    ->join('prefectures as pc', function($join) {
                        $join->on('pc.id', 'pf.prefecture_id');
                    })
                    ->select(
                        'pf.name as user_name',
                        'pf.age',
                        'pf.profile',
                        'pc.name as prefecture_name',
                        'matches.match_sender_id',
                        'matches.match_reciver_id'
                    )
                    ->get();
    }
}