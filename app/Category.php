<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function news()
    {
      return $this->hasMany('App\New');
    }
    public function user()
  {
    return $this->belongsTo('App\User');
  }
}
