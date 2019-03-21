<?php

namespace App\Http\Controllers;
use App\Category;
use App\News;
use Auth;
use File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class NewController extends Controller
{
    public function getNewIndex()
    {
      $new = News::where('user_id', Auth::id() )->get();
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
      $categories = Category::all();
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
      $image = $request->file('photo');
      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $new_name);
      $new = new News([
        'title' => $request->input('title'),
        'photo' => $new_name,
        'category_id' => $request->input('category_id'),
        'user_id' => Auth::id(),
        'content' => $request->input('content'),
      ]);

      $new->save();
      return redirect()->route('new.index')->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
    }
    public function getNewEdit($id){
      $new = News::find($id);
      $categories = Category::all();

      return view('new.edit', ['new' => $new , 'newId' => $id, 'categories' => $categories]);
    }
    public function postNewUpdate(Request $request)
    {
      $new = News::find($request->input('id'));
      $new->fill($request->except('avatar'));
      $this->validate($request, [
        'title' => 'required',
        'photo_1' => 'required',
        'category_id' => 'required',
        'content' => 'required'
      ]);
      $im = $request->input('photo');
      // dd('stop');
      if($request->hasFile('photo')) {
        $this->validate($request,[
          'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        $file_path = public_path('images').'/'.$request->input('photo_1');
        // dd($file_path);
        File::delete($file_path);
        $image = $request->file('photo');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $new->photo = $new_name;
      }else{

      }
      $new->title = $request->input('title');
      $new->category_id = $request->input('category_id');
      $new->photo = $new->photo;
      $new->content = $request->input('content');
      $new->save();
      return redirect()->route('new.index')->with('info', 'New is update!');
    }
    public function getNewDelete($id)
    {
      $new = News::find($id);
      $new->delete();
      return redirect()->route('new.index')->with('info', 'New is deleted!');
    }
}
