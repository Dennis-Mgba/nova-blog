<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nova-blog') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- toastr styles -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    @yield('styles')

    <style>
        .py-3 {
            background-color: #F9F9F9;
            min-height: 550px;
        }

         .dash {
            margin-left: 2px;
            margin-bottom: 50px;
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin/home') }}">
                    {{-- {{ config('app.name', 'Nova-blog') }} --}}
                    Nova
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-3">
            <div class="container dash">
                <div class="row">

                    @if (Auth::check())
                        <div class="col-lg-3">
                            <ul class="list-group">
                                <li class="list-group-item"> <a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="list-group-item"> <a href="{{ route('categories') }}">Category</a></li>
                                <li class="list-group-item"> <a href="{{ route('tags') }}">Tag</a></li>
                                <li class="list-group-item"> <a href="{{ route('posts') }}">All Posts</a></li>
                                @if (Auth::user()->admin)
                                    <li class="list-group-item"> <a href="{{ route('users') }}">Users</a></li>
                                    <li class="list-group-item"> <a href="{{ route('user.create') }}">Add User</a></li>
                                @endif
                                <li class="list-group-item"> <a href="{{ route('post.trashed') }}">All trashed posts</a></li>
                                <li class="list-group-item"> <a href="{{ route('category.create') }}">Add new category</a></li>
                                <li class="list-group-item"> <a href="{{ route('tag.create') }}">Add new Tag</a></li>
                                <li class="list-group-item"> <a href="{{ route('post.create') }}">Create new post</a></li>
                                <li class="list-group-item"> <a href="{{ route('users.profile') }}">My profile</a></li>
                                @if (Auth::User()->admin)
                                    <li class="list-group-item"> <a href="{{ route('settings') }}">Settings</a></li>
                                @endif
                            </ul>
                        </div>
                    @endif

                    <div class="col-lg-9">
                            @yield('content')
                    </div>

                </div>
            </div>
        </main>
    </div>

    {{--Bootstrap--}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    {{-- <script src="/js/app.js"></script> --}}

    {{-- Toastr js --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    {{--check for presence of a session in our application, so that we can use the toastr--}}
    <script>
        @if(Session::has('success'))    // if there is a session called success, run the code on the next like of code.
            toastr.success("{{ Session::get('success') }}");     // so on this line we are calling the toastr.success method on a define sucess session that we declared in our application
        @elseif (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @elseif (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>

    @yield('scripts')

</body>
</html>
