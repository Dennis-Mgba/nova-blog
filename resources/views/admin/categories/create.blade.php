@extends('layouts.app')

@section('content')
        @include('admin.includes.errors')      {{-- The include statement will take all the errors in the errors.blade.php file and import them here--}}

    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new caterogy
        </div>

        <div class="panel-body">
            <form class="" action="{{ route('category.store') }}" method="post">
                {{ csrf_field() }}
                <!--create input fields based on the columns define in the posts migration table-->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit"  class="btn btn-success">
                            store category
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection
