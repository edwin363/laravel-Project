<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $table = 'repositories';

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
}
