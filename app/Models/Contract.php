<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function territory()
    {
        return $this->belongsTo('App\Models\Territory');
    }

    public function scholarship()
    {
        return $this->hasOne('App\Models\Scholarship');
    }
}
