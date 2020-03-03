@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <p>Categories</p>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Category name</th>
                    <th>editing</th>
                    <th>deleting</th>
                </thead>
                <tbody>
                    @if ($categories->count() > 0)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td><a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-xs btn-info"> Edit </a> {{--directs to the edit route--}}
                                </td>
                                <td><a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-xs btn-danger"> Del </a> {{--directs to the delete route--}}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center" style="color: #4267b2">No categories yet.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
