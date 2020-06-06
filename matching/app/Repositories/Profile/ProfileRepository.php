<?php

namespace App\Repositories\Profile;

use App\Models\{Profile, User};

class ProfileRepository implements ProfileRepositortInterface
{
    protected $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function getProfile($id)
    {
        $user = new User();
        $user = $user->find($id);
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

    public function update($inputs, $id)
    {
        $profile = $this->profile->find($id);
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