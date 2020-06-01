<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $title }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/crumina-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/grid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/styles.css') }}">


    <!--Plugins styles-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/primary-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/magnific-popup.css') }}">

    <!--Styles for RTL-->
    <!--<link rel="stylesheet" type="text/css" href="app/css/rtl.css">-->

    <!--External fonts-->
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

    <!-- toastr styles -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <style>
        .padded-50{
            padding: 40px;
        }
        .text-center{
            text-align: center;
        }

        .second-post-section img, .latest-post img, .small-post img {
            width: 100%;
            object-fit: cover;
        }

        .latest-post img {
            height: 430px;
        }

        .second-post-section img {
            height: 280px;
        }

        .small-post img {
            height: 183px;
        }
    </style>

</head>


<body class=" ">

<div class="content-wrapper">

    @include('includes.header')

    <div class="header-spacer"></div>

    <div class="container">
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-lg-2"></div>
            <div class="col-lg-8"> <!-- div for the latest post -->
                <article class="hentry post post-standard has-post-thumbnail">
                        <div class="post-thumb latest-post">
                            <img src="{{ $latest_post->featured}}" alt="{{ $latest_post->title }}">
                            <div class="overlay"></div>
                            <a href="{{ $latest_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title text-center">
                                        <a href="{{ route('post.single', [ 'slug' => $latest_post->slug]) }}">{{ $latest_post->title }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                            {{ $latest_post->created_at->diffForHumans() }}  -  {{ $latest_post->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <!-- output the category of the post based on the relation declared in the post model  -->
                                            <a href="{{ route('category.single', ['id' => $latest_post->category->id]) }}">{{ $latest_post->category->name }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row"> <!-- div containing the last two post -->
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb second-post-section">
                            <img src="{{ $second_post->featured }}" alt="{{ $second_post->title }}">
                            <div class="overlay"></div>
                            <a href="{{ $second_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title text-center ">
                                        <a href="15_blog_details.html">{{ $second_post->title }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $second_post->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="">{{ $second_post->category->name }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb second-post-section">
                            <img src="{{ $third_post->featured }}" alt="{{ $third_post->title }}">
                            <div class="overlay"></div>
                            <a href="{{ $third_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title text-center">
                                        <a href="15_blog_details.html">{{ $third_post->title }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $third_post->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('category.single', ['id' => $third_post->category->id]) }}">{{ $third_post->category->name }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $latest_category->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach ($latest_category->posts()->orderBy('created_at', 'desc')->take(3)->get() as $tag_post)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="case-item">
                                        <div class="case-item__thumb small-post">
                                            <img src="{{ $tag_post->featured }}" alt="{{ $tag_post->title }}">
                                        </div>
                                        <h6 class="case-item__title text-center"><a href="#">{{ $tag_post->title }}</a></h6>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $tutorials->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach ($tutorials->posts()->orderBy('created_at', 'desc')->take(3)->get() as $tutorial)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="case-item">
                                        <div class="case-item__thumb small-post">
                                            <img src="{{ $tutorial->featured }}" alt="{{ $tutorial->title }}">
                                        </div>
                                        <h6 class="case-item__title text-center"><a href="#">{{ $tutorial->title }}</a></h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $career->name}}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach ( $career->posts()->orderBy('created_at', 'desc')->take(3)->get() as $career_category)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="case-item">
                                        <div class="case-item__thumb small-post">
                                            <img src="{{ $career_category->featured }}" alt="{{ $career_category->title }}">
                                        </div>
                                        <h6 class="case-item__title"><a href="#">{{ $career_category->title }}</a></h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
            </div>
            </div>
        </div>
    </div>

<!-- Subscribe Form -->

@include('includes.form')

<!-- End Subscribe Form -->
</div>



<!-- Footer -->
@include('includes.footer')
<!-- End Footer -->

<!-- Overlay Search -->
@include('includes.search')
<!-- End Overlay Search -->

<!-- JS Script -->

{{-- Toastr js --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{ asset('app/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('app/js/crum-mega-menu.js') }}"></script>
<script src="{{ asset('app/js/swiper.jquery.min.js') }}"></script>
<script src="{{ asset('app/js/theme-plugins.js') }}"></script>
<script src="{{ asset('app/js/main.js') }}"></script>
{{-- <script src="{{ asset('app/js/form-actions.js') }}"></script> --}}

<script src="{{ asset('app/js/velocity.min.js') }}"></script>
<script src="{{ asset('app/js/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('app/js/animation.velocity.min.js') }}"></script>

<script>
    @if (Session::has('subscribed'))
        toastr.success("{{ Session::get('subscribed') }}");
    @endif
</script>

<!-- ...end JS Script -->

</body>
</html>
