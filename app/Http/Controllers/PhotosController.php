<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Album;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PhotosController extends Controller
{
  public function showAllAlbumsForm($username){
    $users=User::where('username',$username)->firstOrFail();
    $albums=Album::with('Photos')->where('user_id',$users->id)->orderBy('title', 'desc')->orderBy('created_at', 'desc')->get();

    if(Auth::user()->id != $users->id){
      return redirect(Auth::user()->username.'/uploadPhoto');
    }

    return view('portfolio.allAlbums',compact('users'),compact('albums'));
  }

  public function showPhotoUploadForm($username, $album_id){
    $users=User::where('username',$username)->firstOrFail();
    if(Auth::user()->id != $users->id){
      return redirect(Auth::user()->username.'/'.$album_id.'/uploadPhoto');
    }
    return view('portfolio.addPhotos')->with('album_id',$album_id);
  }

  public function uploadPhoto(Request $request,$username, $album_id){
    $user_id=Auth::user()->id;

    // Validation
    $this->validate($request,[
      'title'=>'string|required|min:3',
      'caption'=>'string|required',
      'photo'=>'image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    if($request->hasfile('photo')){
    $photo = $request->file('photo');

    //get filename with extension
    $filenameWithExt= $photo->getClientOriginalName();

    //get just the $filename
    $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

    //get extension
    $extension= $photo->getClientOriginalExtension();

    //Filename to be stored!
    $filename = $filename.'_'.time().'.'.$extension;

    //Path of file stored, (sorage:link)
    $photo->storeAs('public/'.$album_id.'/photos',$filename);

    // Upload Photo
    $photo= new Photo;
    $photo->album_id=$album_id;
    $photo->user_id=$user_id;
    $photo->title=$request->get('title');
    $photo->description=$request->get('caption');
    $photo->size=$request->file('photo')->getClientSize();
    $photo->photo=$filename;

    $photo->save();


    // Display message
    $status='success';
    $message='Photo has been uploaded';
  }else{
    $status='warning';
    $message='Sorry! Photo upload failed';
  }

  $album_title=Album::with('Photos')->findOrFail($album_id)->title;
  return redirect('/albums/'.$album_id.'/'.$album_title)->with($status,$message);
  }

  public function Discover(){
    $photos=Photo::with(['user','album'])->orderBy('updated_at', 'desc')->get();
    return view('discover',compact('photos'));
  }


  public function showPhotoEditForm($album_id,$photo_id){
    $photo=Photo::findOrFail($photo_id);
    return view('editForms.editPhoto',compact('photo','album_id'));
  }


  public function editPhoto(Request $request,$album_id,$photo_id){
    $album=Album::findOrFail($album_id);
    $photo=Photo::findOrFail($photo_id);

    $this->validate($request,[
      'title'=>'string|min:3|nullable',
      'caption'=>'string|nullable',
      'photo'=>'image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    if($request->get('title')!=null || $request->get('caption')!=null || $request->hasfile('photo')){
      if($request->hasfile('photo')){

        //Delete current coverImage..
        $oldPhoto = public_path($album_id.'/photos/' . $photo->photo);
        if (File::exists($oldPhoto)) {
          unlink($oldPhoto);
        }

        $newPhoto = $request->file('photo');

        //get filename with extension
        $filenameWithExt= $newPhoto->getClientOriginalName();

        //get just the $filename
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

        //get extension
        $extension= $newPhoto->getClientOriginalExtension();

        //Filename to be stored!
        $filename = $filename.'_'.time().'.'.$extension;

        //Path of file stored, (sorage:link)
        $newPhoto->storeAs('public/'.$album_id.'/photos',$filename);
        $photo->photo=$filename;

        $message='Photo has been UPDATED!!';

      }

      if($request->get('title')!=null){
        $photo->title=$request->get('title');
        $message='Photo Title has been Changed!';
      }

      if($request->get('caption')!=null){
        $photo->description=$request->get('caption');
        $message='Album Description has been Changed!';
      }
      // Display message
      $status='success';
    }else {
      $status='warning';
      $message='Please fill the field you want to edit';
      return redirect()->back()->with($status,$message);
    }
    $photo->save();
    return redirect('/albums/'.$album_id.'/'.$album->title)->with($status,$message);
  }

  public function Destroy($album_id,$photo_id){
    $photo=Photo::findOrFail($photo_id);

    if(Storage::delete('public/'.$album_id.'/photos'.'/'.$photo->photo)){
      $photo->delete();
      return redirect(Auth::user()->username)->with('success','Photo has been deleted!!');
    }
    return redirect(Auth::user()->username)->with('success','Photo has been deleted!!');
  }

}
