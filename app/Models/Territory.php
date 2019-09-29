<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{
    protected $table = 'territories';

    public function scholarchips_detail()
    {
        return $this->hasMany('App\Models\Scholarship_detail');
    }
}
