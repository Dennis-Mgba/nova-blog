@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Category name</th>
                    <th>editing</th>
                    <th>deleting</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td><a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-xs btn-info"> Edit </a> {{--directs to the edit route--}}
                            </td>
                            <td><a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-xs btn-danger"> Del </a> {{--directs to the delete route--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
