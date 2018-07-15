<?php

namespace App\Http\Controllers\apiControllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class apiRegisterController extends Controller
{

      /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
      */

      use RegistersUsers;

      /**
       * Handle a registration request for the application.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function register(Request $request)
      {
          $this->validator($request->all())->validate();

          event(new Registered($user = $this->create($request->all())));

          //added by Binaya: Return Json Reply
          return response()->json(['status'=>'Verification mail has been send to your email, Please verify your account to login!']);

      }

      /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
          $this->middleware('guest');
      }

      /**
       * Get a validator for an incoming registration request.
       *
       * @param  array  $data
       * @return \Illuminate\Contracts\Validation\Validator
       */
      protected function validator(array $data)
      {
          return Validator::make($data, [
              'name' => 'required|string|max:255',
              'username' => 'required|string|max:20|min:3|unique:users',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|confirmed',
          ]);
      }

      /**
       * Create a new user instance after a valid registration.
       *
       * @param  array  $data
       * @return \App\User
       */
      protected function create(array $data)
      {
          $user = User::create([
              'name' => $data['name'],
              'username' => $data['username'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'token'=>str_random(32),
          ]);

          $user->sendVerificationEmail();
          return $user;
      }
}
