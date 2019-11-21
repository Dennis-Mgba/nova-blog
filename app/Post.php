<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongTo('App\Category')   // in the hasMany() - we will refrence the App\category class
    }
}
