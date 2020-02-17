<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [

        'name_p',
        'name',
        'email',
        'phone',
        'message',
        'status',
    ];
}
