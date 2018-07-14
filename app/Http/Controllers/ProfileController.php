<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use App\Album;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{


    public function showProfilePage($username){
      $users=User::where('username',$username)->firstOrFail();
      $albums=Album::with('Photos')->where('user_id',$users->id)->orderBy('title', 'desc')->orderBy('created_at', 'desc')->get();
      $photos = Photo::with('album')->where('user_id',$users->id)->orderBy('updated_at', 'desc')->get();
      return view('profile',compact('users','albums','photos'));
    }

    public function updateAvatar(Request $request){

      $users=Auth::user();

      // Validation
      $this->validate($request,[
        'avatar'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1999',
      ]);




      if($request->hasfile('avatar')){

        //Delete current avatar image except the deafault one
        if ($users->avatar !== 'default.jpg'){

        $file = public_path('/uploads/avatars/' . $users->avatar);

        if (File::exists($file)) {
          unlink($file);
        }
      }

        $avatar=$request->file('avatar');

        //get filename with extension
        $filenameWithExt= $request->file('avatar')->getClientOriginalName();

        //get just the $filename
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

        //get extension
        $extension= $request->file('avatar')->getClientOriginalExtension();

        //Filename to be stored!
        $filename = $filename.'_'.time().'.'.$extension;

        Image::make($avatar)->resize(300,300)->save(public_path().'/uploads/avatars/'.$filename);

        // $user=Auth::user();
        $users->avatar= $filename;
        $users->save();

        $status='success';
        $message='Your Profile Avatar has been UPDATED!!';
      }else{
        $status='warning';
        $message='Please select an image to update your avatar';
      }
        return redirect($users->username)->with($status,$message);
    }



      public function deleteAvatar(Request $request){
        $users=Auth::user();

        //Delete current avatar image except the deafault one
        if ($users->avatar !== 'default.jpg'){
          $file = public_path('/uploads/avatars/' . $users->avatar);
          if (File::exists($file)) {
            unlink($file);
          }
          $status='success';
          $message='Your Profile Avatar has been DELETED!!';
        }
        else{
          $status='warning';
          $message='You do not have Avatar to Delete';
        }

        //set default avatar after files are deleted
        $users->avatar = 'default.jpg';
        $users->save();

        // return redirect($users->username);
        return redirect($users->username)->with($status,$message);

    }
}
