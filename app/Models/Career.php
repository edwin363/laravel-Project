<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public function university()
    {
        return $this->belongsTo('App\Models\University');
    }

    public function scholarships()
    {
        return $this->hasMany('App\Models\Scholarship');
    }
}
