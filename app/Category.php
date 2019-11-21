<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post')   // in the hasMany() - we will refrence the App\post class
    }
}
