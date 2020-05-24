<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        return view('admin.settings.settings')->with('settings', Setting::first());
    }


    public function updateSetting()
    {   // anothr way of using a request - request()
        $this->validate(request(), [
            'site_name' => 'required',
            'contact_number' => 'required | numeric',
            'contact_email' => 'required | email',
            'address' => 'required'
        ]);
        // dd(request()->all());
        $settings = Setting::first();
        $settings->site_name = request()->site_name;
        $settings->contact_number = request()->contact_number;
        $settings->contact_email = request()->contact_email;
        $settings->address = request()->address;
        $settings->save();

        Session::flash('success', 'Settings updated successfully!');
        return redirect()->back();

    }
}
