<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();   // get the authenticated User - note that we are using the user model here
        return view('admin.users.profile')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request) // we are not goinbg to need the id variable here because we're already get at the authenticated user
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email',
            'github' => 'required|url',
            'twitter'  => 'required|url'
        ]);

        $user = Auth::user();

        // check if the user uploaded an image
        if ($request->hasFile('avatar')) {  // the avatar input from the profile page
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatars', $avatar_new_name);

            $user->profile->avatar = 'uploads/avatars/'.$avatar_new_name;
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->github = $request->github;
        $user->profile->twitter = $request->twitter;
        $user->profile->about = $request->about;

        $user->save();
        $user->profile->save();   // since we also get at the items that are on the profile table

        // for the password
        if($request->has('password')) {
            $user->password = bcrypt($request->pasword);
            $user->save();
        }

        Session::flash('success', 'Profile updated successfully');
        return redirect()->back();
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
