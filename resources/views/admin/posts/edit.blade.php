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
            Edit Post: <strong> {{ $post->title }} </strong>
        </div><br/>

        <div class="panel-body">
            <form class="" action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!--create input fields based on the columns define in the posts migration table-->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" value="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select id="category_id" name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                @if ($post->category->id == $category->id)
                                    selected
                                @endif
                                >
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Select Tags</label>
                    @foreach ($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                @foreach ($post->tags as $tg) {{-- for all tag associated with a post --}}
                                    @if($tag->id == $tg->id) {{-- if the tag id is equal to the tagged -id associated with the post --}}
                                        checked
                                    @endif
                                @endforeach
                                > {{ $tag->tag }} </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" rows="5" cols="5" class="form-control">{{ $post->content }}</textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit"  class="btn btn-success">
                            Update post
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection

@section('styles')
    <!-- inject summernote css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <!-- inject summernote js cdn -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script type="text/javascript">
    // inject the following script
    $(document).ready(function() {
        $('#content').summernote({
        placeholder: 'Creative Writing...',
        height: 120
      });
    });
    </script>
@endsection
