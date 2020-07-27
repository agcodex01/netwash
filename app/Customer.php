<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;
    
    protected $guarded =[];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function image()
    {
        return $this->morphOne(ProfileImage::class,'profile_imageable');
    }

    public function profile()
    {
        return $this->user->userProfile;
    }
}
