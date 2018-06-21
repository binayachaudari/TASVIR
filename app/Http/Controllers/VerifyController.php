<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class VerifyController extends Controller
{
  /**
  * verify user with the given token

  * @param string $token
  * @return response
  */
    public function verify($token){
      User::where('token', $token)->first()
                  ->update(['token'=>null]);//verify the user


                  return redirect()
                  ->route('login')
                  ->with('success','Your account has been verified, You can Login now!');
    }
}
