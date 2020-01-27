<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class tbl_admin extends Model
{
    use Notifiable;
    //
    protected $fillable=['id', 'admin_name', 'admin_email', 'admin_password', 'admin_role', 'admin_status', 'admin_token', 'admin_image'];
}
