<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag'];

    // creating a relationship between the Tag model and the Post model - that a tag can belong to many post
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
