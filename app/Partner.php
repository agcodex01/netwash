<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laundry()
    {
        return $this->hasOne(Laundry::class);
    }

    public function getName(){
        return $this->user()->userProfile->name;
    }
}
