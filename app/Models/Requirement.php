<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    public function academic_level()
    {
        return $this->belongsTo('App\Models\Academic_level');
    }

    public function scholarships()
    {
        return $this->hasMany('App\Models\Scholarship', 'requirements_id');
    }
}
