<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    protected $fillable=[
      'title', 'discription', 'cover_img','user_id',
      ];

    public function photos(){
      return $this->hasMany('App\Photo');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }
}
