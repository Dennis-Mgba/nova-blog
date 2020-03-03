@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <p>Trashed posts</p>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Restore</th>
                    <th>Destroy</th>
                </thead>
                <tbody>
                    @if ($posts->count() > 0)
                        @foreach($posts as $post)
                            <tr>
                                <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="50px" height="50px"> </td>
                                <td>{{ $post->title }}</td>
                                <td><a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-xs btn-success"> restore </a> {{--directs to the edit route--}}
                                </td>
                                <td><a href="{{ route('post.kill', ['id' => $post->id]) }}" class="btn btn-xs btn-danger"> delete </a> {{--directs to the delete route--}}
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <th colspan="5" class="text-center" style="color: #4267b2">No trashed post.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
