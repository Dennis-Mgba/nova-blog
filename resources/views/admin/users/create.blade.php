@extends('layouts.app')

@section('content')
        @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new User
        </div>

        <div class="panel-body">
            <form class="" action="{{ route('user.store') }}" method="post">
                {{ csrf_field() }}
                <!--create input fields based on the columns define in the users migration table-->
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" value="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">User Email</label>
                    <input type="email" name="email" value="" class="form-control">
                </div>

                {{-- <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" value="" class="form-control">
                </div>
                 --}}
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit"  class="btn btn-success">
                            Add User
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection
