@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <p>Published posts</p>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Trash</th>
                </thead>
                <tbody>
                    @if ($posts->count() > 0)
                        @foreach($posts as $post)
                            <tr>
                                <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="50px" height="50px"> </td>
                                <td>{{ $post->title }}</td>
                                <td><a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-xs btn-info"> edit </a></td> {{--directs to the edit route--}}
                                <td><a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-xs btn-danger"> trash </a></td> {{--directs to the delete route--}}
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center" style="color: #4267b2">No published post.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
