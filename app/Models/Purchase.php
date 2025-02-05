<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }

   
}
