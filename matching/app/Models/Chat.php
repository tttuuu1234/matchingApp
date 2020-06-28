<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'sender_id',
        'reciver_id',
        'chat_room_id',
        'message'
    ];
}
