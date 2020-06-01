@extends('layouts.frontend')

@section('single_post_content')
    <style media="screen">
        .blog-details-author-thumb img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }
    </style>

    <div class="text-center">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title" style="color: #000;">{{ $post_title }}</h1>
        </div>
    </div>

    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <div class="post-thumb">
                            <img src="{{ $post->featured }}" alt="{{ $post_title }}">
                        </div>

                        <div class="post__content">


                            <div class="post-additional-info">

                                <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">{{ $post->user->name}}</a>
                                    </div>

                                </div>

                                <span class="post__date">

                                    <i class="seoicon-clock"></i>

                                    <time class="published" datetime="2016-03-20 12:00:00">
                                        {{ $post->created_at->toFormattedDateString() }}
                                    </time>

                                </span>

                                <span class="category">
                                    <i class="seoicon-tags"></i>
                                    <a href="{{ route('category.single', ['id' => $post->category->id]) }}">{{ $post->category->name }}</a>
                                </span>

                            </div>

                            <div class="post__content-info">
                                <p class="post__text">
                                    {!! $post->content !!}     <!-- The !! ... !! will help format the html tag set on the content to be display according to what the tag is and not show the actual html tag -->
                                </p>

                                <div class="padded-50"></div>

                                <div class="widget w-tags">
                                    <h4 class="heading-title" style="margin-bottom: 20px;">TAGS</h4>
                                    <div class="tags-wrap">
                                        @foreach ($post->tags as $tag)
                                            <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="socials text-center">Share:                        
                            <!-- Sharing tool from the addthis.com -->
                            <div class="addthis_inline_share_toolbox_2ey4"></div>
                        </div>

                    </article>

                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img src="{{ asset($post->user->profile->avatar)}}" alt="{{ $post->user->name }}">
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">{{ $post->user->name }}</h5> <!-- using the data $post variable that is fetching all the post table data -> access the user table and get the name column -->
                                {{-- <p class="author-info">SEO Specialist</p> --}}
                            </div>
                            <p class="text">{{ $post->user->profile->about }}</p>
                            <div class="socials">

                                <a href="{{ $post->user->profile->github }}" class="social__item" target="_blank">
                                    <img src="{{ asset('app/svg/github2.svg') }}" alt="github">
                                </a>

                                <a href="{{ $post->user->profile->twitter }}" class="social__item" target="_blank">
                                    <img src="{{ asset('app/svg/twitter.svg') }}" alt="twitter">
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="pagination-arrow">

                        @if ($prev_post) <!-- if there is a previous post -->
                            <!-- set a link to a post- fetch the single page template with the slug of the previous post -->
                            <a href="{{ route('post.single', ['slug' => $prev_post->slug]) }}" class="btn-prev-wrap">
                                <svg class="btn-prev">
                                    <use xlink:href="#arrow-left"></use>
                                </svg>
                                <div class="btn-content">
                                    <div class="btn-content-title">Prev Post</div>
                                    <p class="btn-content-subtitle">{{ $prev_post->title }}</p>
                                </div>
                            </a>
                        @endif

                        @if ($next_post) <!-- if there is a next post -->
                            <!-- set a link to a post- fetch the single page template with the slug of the next post -->
                            <a href="{{ route('post.single', ['slug' => $next_post->slug]) }}" class="btn-next-wrap">
                                <div class="btn-content">
                                    <div class="btn-content-title">Next Post</div>
                                    <p class="btn-content-subtitle">{{ $next_post->title }}</p>
                                </div>
                                <svg class="btn-next">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                        @endif

                    </div>

                    <div class="comments"> <!-- Inject/integrate disqus comment managing platform API-->

                        <div class="heading text-center">
                            <h4 class="h1 heading-title">Comments</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>
                        @include('includes.disqus')
                    </div>
                </div>

                <!-- End Post Details -->

                <!-- Sidebar-->

                <div class="col-lg-12">
                    <div class="padded-50"></div>
                    <aside aria-label="sidebar" class="sidebar sidebar-right">
                        <div  class="widget w-tags">
                            <div class="heading text-center">
                                <h4 class="heading-title">ALL BLOG TAGS</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>

                            <div class="tags-wrap">
                                @foreach ($tags as $tag)
                                    <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- End Sidebar-->

            </main>
        </div>
    </div>
@endsection
