<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;
use App\Category;
use App\News;

class SettingController extends Controller
{
    public function getAdminIndex()
    {
      $new = News::where('user_id', Auth::id() )->get();
      $categroy = Category::where('user_id', Auth::id() )->get();
      return view('admin.index',['news' => $new, 'categories' => $categroy]);
    }
    public function getSetting(Request $request)
    {
      $user = user::where('id',Auth::id())->first();;
      return view('admin.setting' ,['user' => $user]);
    }
    public function postSettingUpdate(Request $request)
    {

      $user = user::where('id',Auth::id())->first();
      $request->validate([
        'site_name' => 'required',
        'email' => 'required',
        'keyword' => 'required',
        'desc' => 'required',
        'status' => 'required',
        'message' => 'required'
      ]);
      // print_r($user);
      // echo '<hr>';
      // echo $user->email;
      // dd();
      $user->site_name = $request->input('site_name');
      $user->email = $request->input('email');
      $user->keyword = $request->input('keyword');
      $user->desc = $request->input('desc');
      $user->status = $request->input('status');
      $user->message = $request->input('message');
      $user->save();
      return redirect()->route('admin.setting')->with('info' , 'Setting is Update');
    }
    public function searchCategory(Request $request)
    {
        $q = $request->get('search');
        $categroy = Category::where('name','LIKE','%'.$q.'%')->get();
        $new = News::where('title','LIKE','%'.$q.'%')->get();
        return view('admin.searchCat',['categories' => $categroy, 'news' => $new, 'search' => $q]);
    }
    public function searchNew(Request $request)
    {
        $q = $request->get('search');
        $categroy = Category::where('name','LIKE','%'.$q.'%')->get();
        $new = News::where('title','LIKE','%'.$q.'%')->get();
        return view('admin.searchNew',['categories' => $categroy, 'news' => $new, 'search' => $q]);
    }
}
