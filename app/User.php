<?php

namespace App;

use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Returns true if user is  verified;
     *
     * @return null
     */

     public function photos(){
       return $this->hasMany('App\Photo');
     }

     public function albums(){
       return $this->hasMany('App\Album');
     }


    public function verified(){
      return $this->token===null;
    }



    public function sendVerificationEmail(){
      $this->notify(new VerifyEmail($this));
    }
}
