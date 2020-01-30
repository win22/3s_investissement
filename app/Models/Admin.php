<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
    use BasicAuthenticatable;
    protected $fillable = ['name', 'email','password', 'token', 'image', 'role', 'status'];

    public function getAuthPassword()
    {
       return $this->password;
    }
}
