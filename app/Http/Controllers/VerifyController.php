<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifyController extends Controller
{
  /**
  * verify user with the given token

  * @param string $token
  * @return response
  */
    public function verify($token){
      User::->where('token',$token)->firstOrfail()
                  ->update(['token'=>null]);//verify the user


                  return redirect()
                  ->route('home')
                  ->with('success','Account Verified!');
    }
}
