<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['site_name', 'email', 'keyword', 'desc', 'status', 'message'];
}
