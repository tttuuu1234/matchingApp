<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'age',
        'sex',
        'profile',
        'matching_age_from',
        'matching_age_to',
        'icon',
        'prefecture_id',
        'user_id'
    ];

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
}
