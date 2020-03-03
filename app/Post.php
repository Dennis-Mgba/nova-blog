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
        'slug'
    ];

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }


    protected $dates = ['deleted_at'];          // for soft delete


    public function category()
    {
        return $this->belongTo('App\Category');   // in the hasMany() - we will refrence the App\category model class
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
