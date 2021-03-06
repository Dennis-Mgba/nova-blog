@extends('layouts.app')

@section('content')
        @include('admin.includes.errors')      {{-- The include statement will take all the errors in the errors.blade.php file and import them here--}}

    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new tag
        </div>

        <div class="panel-body">
            <form class="" action="{{ route('tag.store') }}" method="post">
                {{ csrf_field() }}
                <!--create input fields based on the columns define in the posts migration table-->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="tag" value="" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit"  class="btn btn-success">
                            store tag
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection
