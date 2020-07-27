<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $guarded = [];
    
    public function laundry() {
        return $this->belongsTo(Laundry::class);
    }

    public function address() {
        return $this->hasOne(Address::class);
    }

    public function staffs() {
        return $this->hasMany(Staff::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function laundryName()
    {
        return $this->laundry->laundryName();
    }

    public function image(){
        
        return $this->morphOne(ProfileImage::class,'profile_imageable');
    }
}
