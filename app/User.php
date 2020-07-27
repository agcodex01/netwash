<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InvoicePaid;

class User extends Authenticatable //implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','username', 'role', 'password',
    ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function userProfile(){
        return $this->hasOne(UserProfile::class);
    }

    public function partner(){
        return $this->hasOne(Partner::class);
    }
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

   
    
}
