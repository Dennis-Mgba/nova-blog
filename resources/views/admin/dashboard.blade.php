@extends('layouts.app')

@section('content')
    <style media="screen">
        .card-components {
            display: flex;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="text-center"><h3>Dashboard</h3></div><br>

            <div class="card-components">

                <div class="col-lg-3">
                    <div class="card ">
                        <div class="card-header bg-success text-white">
                            <h5 class="text-center">USERS</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">{{ $users_count }}</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card ">
                        <div class="card-header bg-info text-white">
                            <h5 class="text-center">POSTS</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">{{ $posts_count }}</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card ">
                        <div class="card-header bg-info text-white">
                            <h5 class="text-center">CATEGORIES</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">{{ $categories_count }}</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card ">
                        <div class="card-header bg-info text-white">
                            <h5 class="text-center">TAGS</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">{{ $tags_count }}</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card ">
                        <div class="card-header bg-danger text-white">
                            <h5 class="text-center">TRASHED</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">{{ $trashed_count }}</h5>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
