<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $fillable = ['title', 'photo' , 'category_id', 'user_id', 'content'];

  public function Category()
  {
    return $this->belongsTo('App\Category','Category_id');
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
