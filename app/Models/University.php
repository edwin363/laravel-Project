<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'universities';

    public function country()
    {
        return $this->belongTo('App\Models\Country');
    }

    public function careers()
    {
        return $this->hasMany('App\Models\Career');
    }

    public function scholarships_detail()
    {
        return $this->hasMany('App\Models\Scholarship_detail');
    }
}