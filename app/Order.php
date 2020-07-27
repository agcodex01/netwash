<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $guarded = [];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    
}
 