<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // Read, fetch and display a list of all created post.

    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all()); // when fetching data from the post table it will only grab those data where their deleted-at is "Null"
    }


    // Show the form for creating a new resource.
    public function create()
    {
        $categories = Category::all(); // get all the category

        if($categories->count() == 0)   // if the category count is zero, that is if there is no category
        {
            Session::flash('info', 'You must select category before creating a post');
            return redirect()->back();  // that is, return back to the create post form if there is no category
        }

        return view('admin.posts.create')->with('categories', $categories);
    }


    // Store a newly created resource in storage.
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
            'featured' => 'uploads/posts/'.$featured_new_name,       // the featured will be the path to the folder that will hold the images then concatenated with the file name
            'category_id' => $request->category_id,                // the category_id is the category choosen
            'slug' => str::slug($request->title, '-')
         ]);

         // dd($request->all());
         return redirect()->back();
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



    // Remove the specified data from storage/database.
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        // write a toatr notification

        return redirect()->back();
    }
}
