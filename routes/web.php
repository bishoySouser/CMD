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
Route::get('/changePassword','HomeController@getChangePassword')->name('changePassword');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');


// admin
Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
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
  // Route::get('search',[
  //   'uses' => 'SettingController@postSearch',
  //   'as' => 'admin.search'
  // ]);
  Route::any('search/edit',[
    'uses' => 'SettingController@searchCategory',
    'as' => 'admin.search'
  ]);
  Route::any('search',[
    'uses' => 'SettingController@searchNew',
    'as' => 'admin.searchNew'
  ]);
});

// category
Route::group(['prefix' => 'category', 'middleware' => 'auth'] , function() {
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
Route::group(['prefix' => 'new',  'middleware' => 'auth'] , function() {
  Route::get('', [
    'uses' => 'NewController@getNewIndex',
    'as' => 'new.index'
  ]);
  Route::get('new/{id}', [
    'uses' => 'NewController@getNew',
    'as' => 'new.new'
  ]);
  Route::get('create', [
    'uses' => 'NewController@getNewCreate',
    'as' => 'new.create'
  ]);
  Route::post('create', [
    'uses' => 'NewController@postNewCreate',
    'as' => 'new.create'
  ]);
  Route::get('edit/{id}', function ($id) {
    return  view('new.edit');
  })->name('new.edit');
  Route::get('delete/{id}', [
    'uses' => 'NewController@getNewDelete',
    'as' => 'new.delete'
  ]);
});

Auth::routes();

route::post('/login', [
  'uses' => 'SigninController@signin',
  'as' => 'auth.signin'
]);
