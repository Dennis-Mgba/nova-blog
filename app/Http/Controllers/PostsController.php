<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Support\Facades\Session;
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
        $tags       = Tag::all();       // get all tag

        if($categories->count() == 0 || $tags->count() == 0)   // if the category or tag count is zero
        {
            Session::flash('info', 'There must be a tag and a category available before creating a post');
            return redirect()->back();  // that is, return back to the create post form if there is no category or tag
        }

        return view('admin.posts.create')->with('categories', $categories)
                                         ->with('tags', $tags);
    }


    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required|max:255',       // here we are saying that the title input is required plus the maximum number of string it will accept is 255
            'featured' => 'required|image',      // The featured input is required plus it must be an image
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
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

         $post->tags()->attach($request->tags); // so we say to the $post, access the tags() belongsTo method in its model then call and attach method

         // dd($request->all());

         Session::flash('success', 'Post created successfully');
         // return redirect()->back();
         return redirect()->route('posts');
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


    // Show the form for editing the specified post.
    public function edit($id)
    {
        $post = Post::find($id); // only find post that are not trashed

        return view('admin.posts.edit')->with('post', $post)
                                       ->with('categories', Category::all())
                                       ->with('tags', Tag::all());
    }



    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        // check if the featured image was changed
        if ($request->hasFile('featured')) {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags); // this line of code will go to the database, delete all the tags and create new tags then call the attach() method

        Session::flash('success', 'Post updated successfully');
        return redirect()->route('posts');
    }



    // Remove the specified data from storage/database.
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('info', 'Post has been moved to trash');
        return redirect()->back();
    }



    // Read and fetch the trashd post data
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }



    public function kill($id)
    {
        // to get at the records that was softly deleted,
        // use Post::withTrashed() to get all the records including the trashed ones that was softly deleted
        // ->where('id', $id) that is, where the id of the partcular record
        // ->first() the record to get an instance of the record
        // then the record using a ->forceDelete() method

        $post = Post::withTrashed()->where('id', $id)->first();
        // dd($post);
        $post->forceDelete();

        Session::flash('success', 'Record permanently deleted successfully');
        return redirect()->back();
    }


    public function restore($id)
    {
        // to get at the records that was softly deleted,
        // use Post::withTrashed() to get all the records including the trashed ones that was softly deleted
        // ->where('id', $id) that is, where the id of the partcular record
        // ->first() the record to get an instance of the record
        // then the restore() method

        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'Post restored successfully');
        return redirect()->route('posts');
    }

}
