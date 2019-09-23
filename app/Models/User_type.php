<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    protected $table = 'users_type';

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function home()
    {
        return $this->hasMany('App\Models\Home');
    } 
}
