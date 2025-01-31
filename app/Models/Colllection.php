<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colllection extends Model
{
    public function installment()
    {
        $this->belongsTo(Installment::class);
    }
}
