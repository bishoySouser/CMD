<?php

namespace App\Http\Controllers;
use App\Category;
use App\News;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class NewController extends Controller
{
    public function getNewIndex()
    {
      $new = News::orderBy('id','desc')->get();
      return view('new.index',['news' => $new]);
    }
    public function getNew($id)
    {
      $new = News::where('id',$id)->first();
      $categroy = category::where('id',$new->category_id)->first();
      return view('new.new',['new' => $new,'category' => $categroy]);
    }
    public function getNewCreate()
    {
      $categories = Category::orderBy('id')->get();
      return view('new.create',['categories' => $categories]);
    }
    public function postNewCreate(Request $request)
    {
      $this->validate($request, [
        'title' => 'required',
        'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        'category_id' => 'required',
        'content' => 'required'
      ]);
      $new = new News([
        'title' => $request->input('title'),
        'photo' => $request->file('photo'),
        'category_id' => $request->input('category_id'),
        'content' => $request->input('content'),
      ]);
      if ( $request->has('photo') ) {
        $new->update(['photo' => $request->file('photo')->storeAs('avatars' ,'public')]);
        //$path = $request->file('photo')->store('avatars' ,'public');
      }
      $new->save();
      return redirect()->route('new.index')->with('info','The New is Created !');
    }
}
