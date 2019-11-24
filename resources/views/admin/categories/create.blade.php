@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        @if(count($errors) > 0)  <!--says if the number of error to be display is greater than zero. ie there is something availablle-->
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="panel-heading">
            Create a new post
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
