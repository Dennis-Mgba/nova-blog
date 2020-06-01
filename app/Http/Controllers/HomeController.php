<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use App\Tag;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()         // this method is called when we register
    {
        return view('admin.dashboard')
                    ->with('posts_count', Post::all()->count())
                    ->with('trashed_count', Post::onlyTrashed()->get()->count())
                    ->with('users_count', User::all()->count())
                    ->with('categories_count', Category::all()->count())
                    ->with('tags_count', Tag::all()->count());
    }
}
