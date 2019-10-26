<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract_type extends Model
{
    public function contract()
    {
        return $this->hasMany('App\Models\Contract');
    }
}
