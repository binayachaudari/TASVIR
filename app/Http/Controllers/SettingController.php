<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{

  public function __construct()
   {
       $this->middleware('auth');
   }

    public function ChangeUsername(Request $request){
      $this->validate($request,[
        ''=>'',
        ''=>'',
      ]);
    }

    public function ChangePassword(Request $request){
      if (!(Hash::check($request->get('currPassword'), Auth::user()->password))) {
           // Wrong Password
           return redirect()->back()
           ->withErrors([
            'currPassword' => 'Your current password does not match. Please try again!',
        ]);
       }

       if(strcmp($request->get('currPassword'), $request->get('newPassword')) == 0){
           //Current password and new password are same
           return redirect()->back()
           ->withErrors([
            'newPassword' => 'New Password cannot be same as old password',
          ]);
       }

       $validatedData = $this->validate($request, [
         'currPassword' => 'required',
         'newPassword' => 'required|string|min:6|confirmed',
         'newPassword_confirmation'=>'required|string|min:6',
       ]);

       //Change Password
               $user = Auth::user();
               $user->password = bcrypt($request->get('newPassword'));
               $user->save();

               return redirect()->back()->with("success","Password changed successfully !");
    }
}
