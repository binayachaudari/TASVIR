<?php

namespace App\Http\Controllers;

use App\User;
use App\Album;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
  public function showAlbumCreateForm($username){
    $user_id=Auth::user()->id;
    $users=User::where('username',$username)->firstOrFail();

    if($user_id!=$users->id){
      return redirect(Auth::user()->username.'/createAlbum');
    }
    return view('portfolio.addAlbums');
  }

  public function createAlbum(Request $request, $username){
    $user_id=Auth::user()->id;

    // Validation
    $this->validate($request,[
      'title'=>'string|required|min:3',
      'description'=>'string|required',
      'cover_img'=>'image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    if($request->hasfile('cover_img')){
      $cover_img = $request->file('cover_img');

      //get filename with extension
      $filenameWithExt= $cover_img->getClientOriginalName();

      //get just the $filename
      $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

      //get extension
      $extension= $cover_img->getClientOriginalExtension();

      //Filename to be stored!
      $filename = $filename.'_'.time().'.'.$extension;

      //Path of file stored, (sorage:link)
      $cover_img->storeAs('public/album_covers',$filename);

      $album= new Album;
      $album->title=$request->get('title');
      $album->description=$request->get('description');
      $album->cover_img=$filename;
      $album->user_id=$user_id;

      $album->save();


      // Display message
      $status='success';
      $message='Album has been created';
    }else{
      $status='warning';
      $message='Sorry! Please select an album cover';
      return redirect()->back()->with($status,$message);
    }
    return redirect(Auth::user()->username)->with($status,$message);
  }

  public function show($album_id, $album_title){
    $album=Album::with(['Photos','user'])->findOrFail($album_id);
    return view('portfolio.insideAlbums',compact('album'));
  }

  public function showEditAlbumForm($album_id){
    $album=Album::findOrFail($album_id);
    return view('editForms.editAlbum',compact('album'));
  }


  public function editAlbum(Request $request, $album_id){
    $album=Album::findOrFail($album_id);

    $this->validate($request,[
      'title'=>'string|min:3|nullable',
      'description'=>'string|nullable',
      'cover_img'=>'image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    if($request->get('title')!=null || $request->get('description')!=null || $request->hasfile('cover_img')){
      if($request->hasfile('cover_img')){

        //Delete current coverImage..
        $oldCover_img = public_path('/album_covers/' . $album->cover_img);
        if (File::exists($oldCover_img)) {
          unlink($oldCover_img);
        }

        $cover_img = $request->file('cover_img');

        //get filename with extension
        $filenameWithExt= $cover_img->getClientOriginalName();

        //get just the $filename
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

        //get extension
        $extension= $cover_img->getClientOriginalExtension();

        //Filename to be stored!
        $filename = $filename.'_'.time().'.'.$extension;

        //Path of file stored, (sorage:link)
        $cover_img->storeAs('public/album_covers',$filename);
        $album->cover_img=$filename;

        $message='Album Cover Changed!';

      }

      if($request->get('title')!=null){
        $album->title=$request->get('title');
        $message='Album Title has been Changed!';
      }

      if($request->get('description')!=null){
        $album->description=$request->get('description');
        $message='Album Description has been Changed!';
      }
      // Display message
      $status='success';
    }else {
      $status='warning';
      $message='Please fill the field you want to edit';
      return redirect()->back()->with($status,$message);
    }
    $album->save();
    return redirect(Auth::user()->username)->with($status,$message);
  }

  public function Destroy($album_id){
    $album=Album::findOrFail($album_id);
    $photos=Photo::where('album_id',$album_id)->delete();

    if(Storage::delete('public/album_covers/'.$album->cover_img) || Storage::deleteDirectory('/public/'.$album->id)){
      $album->delete();
      return redirect(Auth::user()->username)->with('success','Album has been deleted!!');
    }
    return redirect(Auth::user()->username)->with('success','Album has been deleted!!');
  }

}
