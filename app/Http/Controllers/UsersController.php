<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        // place the middleware code Here
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create'); // return a page to create a new user
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required| email'
        ]);

        // after validationn, next ine is to create a new user - User::create(then pass in an array)
        // assign the request input name to the columns of the table - by the name of these coulmns
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);

        // after creating the user - then create a profile for the user
        $profile = Profile::create([
            'user_id' => $user->id, // the $user then access user table id -> , is used in object scope to access methods and properties of an object.
            'avatar' => 'uploads/avatars/person.png'
        ]);

        Session::flash('success', 'user added successfully');
        return redirect()->route('users');
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
         $user = User::find($id);
         $user->profile->delete();   // delete profile
         $user->delete();           // delete user

         Session::flash('success', 'User deleted');
         return redirect()->back();
     }


    // Make a user an administrator
    public function admin($id) {
        $user = User::find($id);
        $user ->admin = 1;
        $user->save();

        Session::flash('success', 'Successfully made user an admin');
        return redirect()->back();

    }

    // Remove administrator permission from user
    public function remove_admin($id) {
        $user = User::find($id);
        $user ->admin = 0;
        $user->save();

        Session::flash('success', 'Successfully made user non-admin');
        return redirect()->back();

    }
}
