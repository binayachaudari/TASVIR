<?php

namespace App\Http\Controllers\apiControllers;

use App\User;
use App\Album;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class apiProfileController extends Controller
{
    public function showProfile($username){
      $users=User::where('username',$username)->firstOrFail();
      $albums=Album::with('Photos')->where('user_id',$users->id)->orderBy('title', 'desc')->orderBy('created_at', 'desc')->get();
      $photos = Photo::with('album')->where('user_id',$users->id)->orderBy('updated_at', 'desc')->get();
      return response()->json(['users'=>$users,'albums'=>$albums]);
    }
}
