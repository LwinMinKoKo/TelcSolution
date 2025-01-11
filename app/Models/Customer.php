<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
    public function staff()
    {
        return $this->belongsTo(Staff::class)->withDefault(['staff_id'=>"Default Staff"]);
    }

    public function product()
    {
    return $this->belongsTo(Product::class)->withDefault(['product_id'=>"Default Product"]);
    }
    public function config()
    {
    return $this->belongsTo(Config::class)->withDefault(['config_id'=>"Default Config"]);
    }

   
  


   
}
