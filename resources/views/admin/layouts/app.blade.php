<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color: #a5d6a7; margin-bottom: 1rem;">
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <nav class="navbar navbar-light bg-faded" style="background-color: #a5d6a7;">
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input style="border:none ;border-radius: 1.2rem 0 0 1.2rem;"   type="text" style="border-radius: 0;" class="form-control input-group-addon" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default"
                                    style="border:none ;border-radius:0  1.2rem 1.2rem 0;" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </nav>
            <nav class="navbar navbar-light bg-faded" style="background-color: #a5d6a7;">
                <ul class="nav navbar-light navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown" style="background-color: #a5d6a7;">
                            <button class="btn btn-secondary btn-link dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuButton">

                                <a class="dropdown-item  href="{{ route('logout') }}"
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
    </nav>
<div class="container-fluid">
    <div class="row  justify-content-center">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            @include('admin.layouts.sidebar')
        </div>
        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
            @yield('content')
        </div>
    </div>
</div>

</div>
<meta name="_token" content="{!! csrf_token() !!}" />
<!-- Scripts
<script src="{{ asset('js/app.js') }}"></script>-->
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="{{ asset('js/tether.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



@yield('scripts')
</body>
</html>
