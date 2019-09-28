<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academic_level extends Model
{
    //protected $table = 'academic_levels';

    public function requirement()
    {
        return $this->hasOne('App\Models\Requirement');
    }
}
