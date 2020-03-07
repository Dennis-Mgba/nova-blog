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
            <form class="" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!--create input fields based on the columns define in the posts migration table-->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" value="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select id="category_id" name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Select Tags</label>
                    @foreach ($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->tag }} </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" rows="5" cols="5" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit"  class="btn btn-success">
                            save post
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection
