<?php

namespace App\Repositories\Chat;

use App\Models\Match;

class ChatRepository implements ChatRepositoryInterface
{
    protected $match;

    public function __construct(Match $match)
    {
        $this->match = $match;
    }

    public function getSenderUsers($userId)
    {
        return $this->match->join('users', function($join) use($userId) {
                            $join->on('users.id', 'matches.match_sender_id')
                            ->where('matches.match_reciver_id', $userId)
                            ->where('matches.approval', 1);
                        })
                        ->join('profiles', function($join) {
                            $join->on('profiles.id', 'matches.match_sender_id');
                        })
                        ->select(
                            'matches.id',
                            'matches.match_sender_id',
                            'matches.match_reciver_id',
                            'profiles.name'
                        )
                        ->get();
    }

    public function getReciverUsers($userId)
    {
        return $this->match->join('users', function($join) use($userId) {
                            $join->on('users.id', 'matches.match_reciver_id')
                            ->where('matches.match_sender_id', $userId)
                            ->where('matches.approval', 1);
                        })
                        ->join('profiles', function($join) {
                            $join->on('profiles.id', 'matches.match_reciver_id');
                        })
                        ->select(
                            'matches.id',
                            'matches.match_sender_id',
                            'matches.match_reciver_id',
                            'profiles.name'
                        )
                        ->get();
    }
}