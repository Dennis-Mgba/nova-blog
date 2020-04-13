@extends('layouts.app')

@section('content')
        @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit your profile
        </div>

        <div class="panel-body">
            <form class="" action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!--create input fields based on the columns define in the profile migration table-->
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" value="" placeholder="enter a new passwword" class="form-control">
                </div>

                <div class="form-group">
                    <label for="avatar">Upload New Profile picture</label>
                    <input type="file" name="avatar" value="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="github">Github Profile</label>
                    <input type="text" name="github" value="{{ $user->profile->github }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="twitter">Twitter Profile</label>
                    <input type="text" name="twitter" value="{{ $user->profile->twitter }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="about">About You</label>
                    <textarea type="text" name="about" id="about" cols="6" rows="6" class="form-control">{{ $user->profile->about }}</textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit"  class="btn btn-success">
                            Update profile
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection
