<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'admin_id', 
        'user_id', 
        'json_message',
        'free',
        //'created_at',
    ];
}
