@extends('layouts.frontend')

@section('single_post_content')
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
                                        <a href="#" class="post__author-link">Admin</a>
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

                        <div class="socials">Share:
                            <a href="#" class="social__item">
                                <i class="seoicon-social-facebook"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-twitter"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-linkedin"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-google-plus"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-pinterest"></i>
                            </a>
                        </div>

                    </article>

                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img src="{{ asset('app/img/blog-details-author.png')}}" alt="Author">
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">Philip Demarco</h5>
                                <p class="author-info">SEO Specialist</p>
                            </div>
                            <p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                nonummy nibh euismod.
                            </p>
                            <div class="socials">

                                <a href="#" class="social__item">
                                    <img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{ asset('app/svg/twitter.svg') }}" alt="twitter">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{ asset('app/svg/google.svg') }}" alt="google">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{ asset('app/svg/youtube.svg') }}" alt="youtube">
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
