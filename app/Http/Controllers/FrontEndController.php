<?php

namespace App\Http\Controllers;
use App\Category;
use App\Setting;
use App\Post;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index')
        ->with('title', Setting::first()->site_name)

        // categories
        ->with('categories', Category::take(4)->get())
        ->with('latest_category', Category::orderBy('created_at', 'desc')->first())
        // ->with('second_category', Category::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
        ->with('tutorials', Category::find(1))
        ->with('career', Category::find(2))

        // posts
        ->with('latest_post', Post::orderBy('created_at', 'desc')->first())  // fetching the first latest post thus order the post by descending order of arrangment using the time of creation
        // skip(1) will skip the first from the data result, take(1) will takeone post, get() will get a collection data array, first() will get the actual post data
        ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
        ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first());

    }
}
