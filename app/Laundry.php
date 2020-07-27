<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Laundry extends Model
{
    //
    protected $fillable = [
        'user_id','owner','description', 'location',
    ];
    protected $guarded = [];


    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function partner(){
        return $this->belongsTo(Partner::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
    public function laundryProfile()
    {
        return $this->hasOne(LaundryProfile::class);
    }

    public function laundryName(){
        return $this->laundryProfile->name;
    }

    public function owner(){
        return $this->partner->user->userProfile->name;
    }

    public function image()
    {
        return $this->morphOne(ProfileImage::class,'profile_imageable');
    }
}
