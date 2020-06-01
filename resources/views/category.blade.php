@extends('layouts.frontend')

@section('single_post_content')
    <style media="screen">
    .small-post img {
        height: 183px;
        width: 100%;
        object-fit: cover;
    }
    </style>

    <div class="text-center">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title" style="color: #000; font-size: 30px;">{{ $category->name}} category</h1>
        </div>
    </div>

    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="row">
                    <div class="case-item-wrap">
                        @foreach ($category->posts as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb small-post">
                                        <img src="{{ $post->featured }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('post.single', ['slug' =>$post->slug]) }}">{{ $post->title }}</a></h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
