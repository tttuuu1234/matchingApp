<?php

namespace App\Services;

use App\Repositories\Prefecture\PrefectureRepositoryInterface;
use App\Repositories\Profile\ProfileRepositortInterface;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
    protected $profile_rep_if;
    protected $prefecture_rep_if;

    public function __construct(ProfileRepositortInterface $profile_rep_if, PrefectureRepositoryInterface $prefecture_rep_if)
    {
        $this->profile_rep_if = $profile_rep_if;
        $this->prefecture_rep_if = $prefecture_rep_if;
    }

    /**
     * profile取得
     * @param integer $id
     *
     * @return object
     */
    public function getProfile($id)
    {
        $profile = $this->profile_rep_if->getProfile($id);

        if(empty($profile)) {
            $profile = [
                'unknown' => '未設定'
            ];
        }

        return $profile;
    }

    /**
     * profile作成
     * @param array $inputs
     */
    public function create($inputs)
    {
        $inputs['user_id'] = Auth::id();
        $this->profile_rep_if->create($inputs);
    }

    /**
     * profile更新
     * @param array $inputs
     * @param integer $id
     */
    public function update($inputs, $id)
    {
        $this->profile_rep_if->update($inputs, $id);
    }

    /**
     * 都道府県取得
     *
     * @return object
     */
    public function getPrefectures()
    {
        return $this->prefecture_rep_if->getPrefectures();
    }

}