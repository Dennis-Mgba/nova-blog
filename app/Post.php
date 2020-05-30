<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'featured',
        'slug',
        'user_id'
    ];

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }


    protected $dates = ['deleted_at'];          // for soft delete


    public function category()
    {
        return $this->belongsTo('App\Category');   // in the belongTo() - we will refrence the App\category model class
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
