<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required|max:255',       // here we are saying that the title input is required plus the maximum number of string it will accept is 255
            'featured' => 'required|image',      // The featured input is required plus it must be an image
            'content' => 'required',
            'category_id' => 'required'
         ]);

         // First we want to take care of the featured image, so that a user won't be able to upload one image more than once
         $featured = $request->featured;
         $featured_new_name = time().$featured->getClientOriginalName();

         // next is to direct the image to the a storage folder. for now we will put the uploaded imae into the public directory as an asset
         $featured->move('uploads/posts', $featured_new_name);

         // then let's save the post
         // $post = new Post;
         $post = Post::create([
        // make sure that the items on the right matches the fields in your table in the database
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts'.$featured_new_name,       // the featured will be the path to the folder that will hold the images then concatenated with the file name
            'category_id' => $request->category_id                 // the category_id is the category choosen
         ]);


         // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
