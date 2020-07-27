<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaundryProfile extends Model
{
    protected $guarded = [];
    
    public function laundry()
    {
        return $this->belongsTo(Laundry::class);
    }
    
}
