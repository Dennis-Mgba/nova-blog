<?php

namespace App\Http\Controllers;
use App\Category;
use App\Setting;
use App\Post;
use App\Tag;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index')
        // settings
        ->with('title', Setting::first()->site_name)
        ->with('settings', Setting::first())

        // categories
        ->with('categories', Category::take(4)->get())      // for nav
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


    public function singlePost($slug) // set an argument
    {
        $post = Post::where('slug', $slug)->first();    // query the post table to fetch the slug of the  current post

        $next_id = Post::where('id', '>', $post->id)->min('id');   // get all the post where the id is great than the current post id then pick the one with the minimum id
        $prev_id = Post::where('id', '<', $post->id)->max('id');   // get all the post where the id is less than the current post id then pick the one with the maximum id

        return view('singlepost')->with('post', $post)
                                  ->with('post_title', $post->title)
                                  ->with('categories', Category::take(4)->get())
                                  ->with('settings', Setting::first())
                                  ->with('title', Setting::first()->site_name)
                                  ->with('next_post', Post::find($next_id))
                                  ->with('prev_post', Post::find($prev_id));
    }

}
