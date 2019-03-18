<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SettingController extends Controller
{
    public function getAdminIndex()
    {
      $user = user::orderBy('name', 'desc')->first();
      return view('admin.index',['user' => $user]);
    }
    public function getSetting(Request $request)
    {
      $user = user::orderBy('name', 'desc')->first();
      return view('admin.setting' ,['user' => $user]);
    }
    public function postSettingUpdate(Request $request)
    {
      $user = user::find($request->input('id'));
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
}
