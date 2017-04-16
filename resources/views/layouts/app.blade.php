<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" >
    <link rel="icon" type="image/gif" href="animated_favicon1.gif" >

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}  @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">

    <nav class="navbar navbar-toggleable-md navbar-light bg-faded bg-main navbar-fixed-bottom" style="margin-bottom: .8rem;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if(is_redactor())
                    <li class="nav-item ">
                        <a class="nav-link" href="/admin">Admin</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <nav class="navbar navbar-light bg-faded bg-main" >
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input style="border:none ;border-radius: 1.2rem 0 0 1.2rem;"   type="text" class="form-control input-group-addon" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default"
                                    style="border:none ;border-radius:0  1.2rem 1.2rem 0;" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </nav>
            <nav class="navbar navbar-light bg-faded bg-main" >
                <ul class="navbar-nav navbar-right bg-main ">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a class="nav-item" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-item" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown" >

                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuButton">

                                <a class="nav-link"  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row  justify-content-center">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                @include('layouts.sidebar')
            </div>
            <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                @yield('content')
            </div>
        </div>
    </div>

</div>

<!-- Scripts -->
<meta name="_token" content="{!! csrf_token() !!}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('js/tether.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>

@yield('scripts')
</body>
</html>
