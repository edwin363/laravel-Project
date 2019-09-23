<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship_detail extends Model
{
    protected $table = 'scholarships_detail';

    public function scholarship()
    {
        return $this->hasOne('App\Models\Scholarship');
    }

    public function scholarships_type()
    {
        return $this->belongsTo('App\Models\Scholarship_type');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function university()
    {
        return $this->belongsTo('App\Models\University');
    }

    public function career()
    {
        return $this->belongsTo('App\Models\Career');
    }
}
