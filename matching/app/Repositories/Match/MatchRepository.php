<?php

namespace App\Repositories\Match;

use App\Models\Match;

class MatchRepository implements MatchRepositoryInterface
{
    protected $match;

    public function __construct(Match $match)
    {
        $this->match = $match;
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

    public function reciveMatchingUsersList($userId)
    {
        return $this->match->join('users', function($join) use($userId) {
            $join->on('users.id', 'matches.match_sender_id')
            // マッチング送信を受信したログインユーザーのidで絞る
            ->where('matches.match_reciver_id', $userId);
        })
        ->join('profiles as pf', function($join) {
            // マッチング送信してきたユーザーのidとプロフィールのid結合
            $join->on('matches.match_sender_id', 'pf.user_id');
        })
        ->join('prefectures as pc', function($join) {
            $join->on('pc.id', 'pf.prefecture_id');
        })
        ->select(
            'pf.name as user_name',
            'pf.age',
            'pf.profile',
            'pc.name as prefecture_name',
            'matches.id as match_id',
            'matches.match_sender_id',
            'matches.match_reciver_id'
        )
        ->get();
    }

    public function approvalMatching($approvalMatchId)
    {
        $this->match->find($approvalMatchId)->update(['approval' => 1]);
    }

}