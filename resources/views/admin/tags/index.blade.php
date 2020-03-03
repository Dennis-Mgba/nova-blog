@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <p>Tags</p>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Tag name</th>
                    <th>edit</th>
                    <th>delete</th>
                </thead>
                <tbody>
                    @if ($tags->count() > 0)
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->tag }}</td>
                                <td><a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-xs btn-info"> Edit </a> {{--directs to the edit route--}}
                                </td>
                                <td><a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-xs btn-danger"> Del </a> {{--directs to the delete route--}}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center" style="color: #4267b2">No tags yet.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
