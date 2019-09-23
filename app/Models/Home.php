<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'home';

    public function user_type()
    {
        return $this->belongsTo('App\Models\User_type');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
