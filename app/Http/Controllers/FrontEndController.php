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
        ->with('categories', Category::take(4)->get())
        ->with('latest_post', Post::orderBy('created_at', 'desc')->first());  // fetching the first latest post thus order the post by descending order of arrangment using the time of creation
    }
}
