<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    public function requirement()
    {
        return $this->belongsTo('App\Models\Requirement');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /*public function scholarship_detail()
    {
        return $this->belongsTo('App\Models\Scholarship_detail');
    }*/

    public function applicants()
    {
        return $this->hasMany('App\Models\Applicant');
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

    public function territory()
    {
        return $this->belongsTo('App\Models\Territory');
    }
}
