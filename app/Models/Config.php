<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }

   
}
