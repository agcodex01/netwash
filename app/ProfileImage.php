<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileImage extends Model
{
    protected $guarded = [];
    
    public function imageable()
    {
        return $this->morphTo();
    }
}
