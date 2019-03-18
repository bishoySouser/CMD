<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function getCategoryCreate()
    {
      return view('category.create');
    }
    public function postCategoryCreate(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
      ]);
      $categroy =  new Category([
        'name' => $request->input('name'),
      ]);
      $categroy->save();
      return redirect()->route('category.index')->with('info', 'Category is create');
    }
    public function getCategory($id)
    {
      $categroy = Category::where('id',$id)->first();
      return view('category.category',['category' => $categroy]);
    }
    public function getCategoryIndex()
    {
      $categroy = Category::orderBy('id','desc')->get();
      return view('category.index', ['categories' => $categroy]);
    }
    public function getCategoryEdit($id)
    {
      $categroy = Category::find($id);
      return view('category.edit', ['category' => $categroy , 'categoryId' => $id]);
    }
    public function postCategoryUpdate(Request $request)
    {
      $categroy = Category::find($request->input('id'));
      $request->validate([
        'name' => 'required',
      ]);
      $categroy->name = $request->input('name');
      $categroy->save();
      return redirect()->route('category.index')->with('info', 'Category is update!');
    }
    public function deleteCategory($id)
    {
      $categroy = Category::find($id);
      $categroy->delete();
      return redirect()->route('category.index')->with('info', 'Category is deleted!');
    }
}
