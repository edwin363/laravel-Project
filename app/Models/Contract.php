<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function contract_type(){
        return $this->belongsTo('App\Models\Contract_type');
    }
}
