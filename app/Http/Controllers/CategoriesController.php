<?php

namespace App\Http\Controllers;

use App\Category;       // use the category model that is in charge of the category table
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // return the index page with the data fetched from the categories table in the database
    public function index()
    {
        return view('admin.categories.index')->with('categories', Category::all()); // in the with->() method, th first param is a variable we declaed called "categories" and the second param is a method all() binded to the Catetory eloquent model to fetch all the data of category in the database and passed it into the "categories" variable declared
    }


    // return the form for creating a new category
    public function create()
    {
        return view('admin.categories.create');
    }


    // Store name of newly added category into the categories table in the database.
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
         ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'Category created successfully');  // first param is the key "success" while the second is the message
        return redirect()->route('categories');
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


    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $category = Category::find($id);       // use the category eloquent model and call a find() method on the "id" param thus fetch/grab a particular category data item

        return view('admin.categories.edit')->with('category', $category);      // then retrurn an edit view page with that category item that was fetched, for editing
    }


    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $category = Category::find($id);    // find the specific category by it id
        $category->name = $request->name;   // pass in/reassign the request of the newly edit category name to the database category table name column
        $category->save();                  // then call a save method

        Session::flash('success', 'Category updated successfully');
        return redirect()->route('categories');     // return to the categories index page
    }


    //Remove the specified resource from storage.
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Session::flash('success', 'Category deleted successfully');
        return redirect()->route('categories');
    }
}
