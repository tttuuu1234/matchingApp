<?php

namespace App\Repositories\Profile;

use App\Models\{Profile, User};

class ProfileRepository implements ProfileRepositortInterface
{
    protected $user;
    protected $profile;

    public function __construct(User $user, Profile $profile)
    {
        $this->user = $user;
        $this->profile = $profile;
    }

    public function getProfile($userId)
    {
        $user = $this->user->find($userId);
        $profile = $user->profile;

        return $profile;
    }

    public function create($inputs)
    {
        $this->profile->create([
            'name' => $inputs['name'],
            'prefecture_id' => $inputs['prefecture'],
            'age' => $inputs['age'],
            'sex' => $inputs['sex'],
            'matching_age_from' => $inputs['matching_age_from'],
            'matching_age_to' => $inputs['matching_age_to'],
            'profile' => $inputs['profile'],
            'user_id' => $inputs['user_id']
        ]);
    }

    public function update($inputs, $userId)
    {
        $user = $this->user->find($userId);
        $profile = $user->profile;

        $profile->update([
            'name' => $inputs['name'],
            'prefecture_id' => $inputs['prefecture'],
            'age' => $inputs['age'],
            'sex' => $inputs['sex'],
            'matching_age_from' => $inputs['matching_age_from'],
            'matching_age_to' => $inputs['matching_age_to'],
            'profile' => $inputs['profile'],
        ]);
    }
}