<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    public function universities()
    {
        return $this->hasMany('App\Models\University');
    }

    public function scholarships()
    {
        return $this->hasMany('App\Models\Scholarship');
    }
}
