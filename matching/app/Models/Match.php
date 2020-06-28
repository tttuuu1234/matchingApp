<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'match_sender_id',
        'match_reciver_id',
        'approval'
    ];

}
