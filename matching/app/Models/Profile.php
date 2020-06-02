<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'sex',
        'profile',
        'matching_age_from',
        'matching_age_to',
        'icon',
        'prefecture_id',
        'user_id'
    ];
}
