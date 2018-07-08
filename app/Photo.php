<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable= [
      'album_id', 'user_id', 'photo','title','discription','size',
      ];

      public function album(){
        return $this->belongsTo('App\Album');
      }

      public function user(){
        return $this->belongsTo('App\User');
      }
}
