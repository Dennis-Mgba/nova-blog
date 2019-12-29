@extends('layouts.app')

@section('content')
        @include('admin.includes.errors')      {{-- The include statement will take all the errors in the errors.blade.php file and import them here--}}

    <div class="panel panel-default">
        <div class="panel-heading">
            Update Category: {{ $category->name }}
        </div>

        <div class="panel-body">
            <form class="" action="{{ route('category.update', ['id' => $category->id]) }}" method="post">  {{--specify where the route is going to submit to, with is the update route--}}
                {{ csrf_field() }}
    
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit"  class="btn btn-success">
                            update category
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection
