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

    public function scholarship_detail()
    {
        return $this->belongsTo('App\Models\Scholarship_detail');
    }

    public function applicants()
    {
        return $this->hasMany('App\Models\Applicant');
    }
}
