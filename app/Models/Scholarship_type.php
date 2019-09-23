<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship_type extends Model
{
    protected $table = 'scholarships_type';
    
    public function scholarships_detail()
    {
        return $this->hasMany('App\Models\Scholarship_detail');
    }
}
