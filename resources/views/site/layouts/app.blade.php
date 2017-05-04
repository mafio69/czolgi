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

        <div class=" col-lg-3  hidden-md-down side-left">

                <aside>
                    <h1>Left</h1>
                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi blanditiis consectetur, debitis
                        delectus dolor ducimus eaque error, et fugiat iusto magnam natus nisi odit officia quod sapiente
                        sint voluptatibus voluptatum?
                    </div>
                    <div>Cumque cupiditate delectus in magni mollitia natus odio quaerat totam unde voluptates! Animi
                        beatae commodi consequatur culpa dicta dolor dolorem doloribus inventore modi nam obcaecati rem
                        reprehenderit, similique, suscipit, ut?
                    </div>
                    <div>Alias aliquam amet asperiores aut deleniti dolorum eaque eius, facilis, laboriosam laudantium
                        natus perferendis perspiciatis placeat quaerat quam rem repellat sequi ullam voluptates
                        voluptatum? Asperiores debitis dolore modi mollitia sunt.
                    </div>
                </aside>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12  side-center ">
                <main>
                    @yield('content')
                    <h1>center</h1>
                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, consectetur dolores ipsam
                        ipsum iure nemo voluptatibus? Ab deleniti natus nisi quos sed! Accusamus enim inventore
                        laboriosam
                        minima nostrum numquam quam?
                    </div>
                    <div>Aliquid animi beatae blanditiis consectetur cum dolores eligendi enim et ex, exercitationem
                        illum
                        ipsa obcaecati omnis quisquam sequi temporibus veniam voluptatibus. Amet earum illum laudantium
                        maiores molestias quasi quis, repellat!
                    </div>
                    <div>Architecto, ipsum quas. Ad consequuntur delectus hic necessitatibus odit omnis quo repudiandae!
                        Ad
                        consequatur deleniti deserunt dolorem ea magnam, minus neque nihil non obcaecati repellat, saepe
                        sapiente similique sint, unde.
                    </div>
                    <div>Ab atque dolor dolore dolorum eum illo incidunt ipsum labore laborum molestias provident quas,
                        qui,
                        ratione rerum velit voluptas voluptatem. Ad aliquid dolorem eos inventore, mollitia pariatur sed
                        soluta sunt.
                    </div>
                    <div>Ad, alias aliquid at aut commodi cumque deserunt, dicta ea eaque eligendi facilis incidunt
                        libero
                        nulla perferendis quae quaerat similique suscipit veniam? Alias labore magni officiis omnis rem
                        ullam voluptate!
                    </div>
                </main>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-12  side-right">
                <aside>
                    <h1>right</h1>
                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam autem blanditiis doloribus
                        eos
                        error fuga, in inventore iure labore magnam maxime minima molestiae neque odit placeat quisquam
                        recusandae sint? Aliquam.
                    </div>
                    <div>Autem beatae cupiditate deleniti dolorem esse impedit, iusto, labore nesciunt nulla optio
                        perspiciatis recusandae repellat similique soluta voluptatum. Aliquid animi cumque maxime
                        perferendis ullam. Dicta laborum nihil qui quod temporibus.
                    </div>
                    <div>Aut deserunt illo minima quisquam, rem suscipit unde. Commodi consectetur deleniti doloremque
                        illo
                        ipsa maiores modi molestiae, nam placeat. Amet, blanditiis expedita in odio quia repellendus.
                        Nisi
                        placeat ullam voluptatem!
                    </div>
                    @include('site.layouts.inc.sidebar')
                </aside>
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
<script src="{{ asset('js/main.js') }}"></script>

@yield('scripts')
</body>
</html>
