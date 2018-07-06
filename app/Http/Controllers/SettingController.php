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
      if(strcmp($request->get('username'), Auth::user()->username) == 0){
          //Current username and new username are same
          return redirect()->back()
          ->withErrors([
           'username' => 'New username cannot be same as old username',
         ]);
       }

      $this->validate($request,[
        'username'=>'required|string|max:20|min:3|unique:users',
        'password'=>'required|string',
      ]);

      if(Hash::check($request->get('password'),Auth::user()->password)){
        $user=Auth::user();
        $user->username=$request->get('username');
        $user->save();
        return redirect()->back()->with("user_success","Username has been changed !");
      }
      else {
        return redirect()->back()->withErrors([
          'password'=>'Incorrect password, Please try again!',
        ]);
      }
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

    public function changeName(Request $request){
      if(strcmp($request->get('name'), Auth::user()->name)==0){
        //Current username and new username are same
        return redirect()->back()
        ->withErrors([
         'name' => 'New name cannot be same as old name',
       ]);
      }
      $validatedData = $this->validate($request,[
        'name'=>'required|min:3|max:25',
      ]);

      if(Hash::check($request->get('password'),Auth::user()->password)){
        $user=Auth::user();
        $user->name=$request->get('name');
        $user->save();
        return redirect()->back()->with("name_success","Your Name has been updated !");
      }
      else {
        return redirect()->back()->withErrors([
          'password'=>'Incorrect password, Please try again!',
        ]);
      }

    }
}
