<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" type="image/gif" href="animated_favicon1.gif">
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Prosto+One" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}Czolgi.info - @yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.tosrus.all.min.css') }}">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div class="container-fluid naglowek">
    <div class="duze">
        <br>
        <h1 class="wielkie">Czolgi.info</h1>
        <h1>Czołgi Świata</h1>
    </div>
    @include('site.layouts.inc.navbar')
</div>
<div class="container-fluid main">
    <div class="row  justify-content-center justify-content-around calosc">
        <div class="col-lg-8 col-md-8 col-sm-12  side-center ">
            <main>
                @yield('content')
            </main>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-12  side-right">
            <aside>
                @yield('rightContent')
            </aside>
        </div>
    </div>
</div>
<!-- Scripts -->
<meta name="_token" content="{!! csrf_token() !!}"/>
<script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
<script src="{{ asset('js/tether.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>

@yield('scripts')

</body>
</html>
