<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    protected $guarded = [];

    public function laundry()
    {
        return $this->belongsTo(Laundry::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
