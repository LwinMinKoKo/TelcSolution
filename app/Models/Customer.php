<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
    public function staff()
    {
        return $this->belongsTo(Customer::class)->withDefault(['staff_id'=>"Default Staff"]);
    }

   
}
