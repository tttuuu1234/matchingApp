<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUsers()
    {
        // profileを作成していないuserは取得されないように
        return $this->user->join('profiles as pf', function($join) {
                        $join->on('users.id', '=', 'pf.user_id');
                        })
                        ->join('prefectures as pc', function($join) {
                            $join->on('pc.id', '=', 'pf.prefecture_id');
                        })
                        ->select(
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
                                return $query->where('pf.sex', '=', $sex);
                            })
                            ->when($searchInputs['matching_age'], function($query, $matchingAge) {
                                return $query->whereBetween('age',[$matchingAge['matching_age_from'], $matchingAge['matching_age_to']]);
                            });
                        })
                        ->join('prefectures as pc', function($join) use($searchInputs) {
                            $join->on('pc.id', '=', 'pf.prefecture_id')
                                ->when($searchInputs['prefecture'], function($query, $prefectureId) {
                                    return $query->where('pc.id', '=', $prefectureId);
                                });
                        })
                        ->select(
                            'pf.name as user_name',
                            'pf.age',
                            'pf.profile',
                            'pc.name as prefecture_name'
                        )
                        ->get();
    }
}