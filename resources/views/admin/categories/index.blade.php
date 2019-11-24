@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Category</th>
                    <th>editing</th>
                    <th>deleting</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
