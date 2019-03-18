<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// admin
Route::group(['prefix' => 'admin'], function () {
  Route::get('', [
    'uses' => 'SettingController@getAdminIndex',
    'as' => 'admin.index'
  ]);
  Route::get('setting',[
    'uses' => 'SettingController@getSetting',
    'as' => 'admin.setting'
  ]);
  Route::post('setting',[
    'uses' => 'SettingController@postSettingUpdate',
    'as' => 'admin.setting'
  ]);
});

// category
Route::group(['prefix' => 'category'] , function() {
  Route::get('', [
    'uses' => 'CategoryController@getCategoryIndex',
    'as' => 'category.index'
  ]);
  Route::get('category/{id}', [
    'uses' => 'CategoryController@getCategory',
    'as' => 'category.category'
  ]);
  Route::get('create', [
    'uses' => 'CategoryController@getCategoryCreate',
    'as' => 'category.create'
  ]);
  Route::post('create', [
    'uses' => 'CategoryController@postCategoryCreate',
    'as' => 'category.create'
  ]);
  Route::get('edit/{id}', [
    'uses' => 'CategoryController@getCategoryEdit',
    'as' => 'category.edit'
  ]);
  Route::post('edit', [
    'uses' => 'CategoryController@postCategoryUpdate',
    'as' => 'category.update'
  ]);
  Route::get('delete/{id}', [
    'uses' => 'CategoryController@deleteCategory',
    'as' => 'category.delete'
  ]);
});

// new
Route::group(['prefix' => 'new'] , function() {
  Route::get('', function () {
    return  view('new.index');
  })->name('new.index');
  Route::get('new/{id}', function ($id) {
    return  view('new.new');
  })->name('new.new');
  Route::get('create', function () {
    return  view('new.create');
  })->name('new.create');
  Route::get('edit/{id}', function ($id) {
    return  view('new.edit');
  })->name('new.edit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
