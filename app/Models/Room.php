<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'message_id', 
        'json_room',
        //'created_at',
    ];
}
