<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{

  public function showChangeUsernameForm(){
        return view('setting.change_username');
    }

  public function showChangePasswordForm(){
          return view('setting.change_password');
      }

    public function ChangeUsername(Request $request){

    }

    public function ChangePassword(Request $request){

    }
}
