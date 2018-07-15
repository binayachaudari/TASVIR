<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class apiLoginController extends Controller
{

      /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
      */

      use AuthenticatesUsers;

      /**
       * Where to redirect users after login.
       *
       * @var string
       */
      // protected $redirectTo = '/';

      /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
          $this->middleware('guest')->except('logout');
      }

      protected function credentials(Request $request)
      {
          $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
              ? $this->username()
              : 'username';

          return [
              $field => $request->get($this->username()),
              'password' => $request->password,
          ];
      }

      public function authenticated(Request $resquest, $user){
        if(!auth()->user()->verified()){
          auth()->logout();
          return response()->json(['warning'=>'You need to confirm your account. We have sent you an activation code, please check your email.']);
        }
        return response()->json(['user'=>$user,'status'=>'202']);
      }

}
