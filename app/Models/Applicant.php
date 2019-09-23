<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    public function profile()
    {
        return $this->belongsTo('App\Models\Profile');
    }

    public function scholarship()
    {
        return $this->belongsTo('App\Models\Scholarship');
    }
}
