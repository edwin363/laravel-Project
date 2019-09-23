<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function applicant()
    {
        return $this->hasOne('App\Models\Applicant');
    }

    public function repository()
    {
        return $this->belongsTo('App\Models\Repository');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
