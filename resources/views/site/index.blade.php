@extends('site.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('leftContent')
    @foreach($articles as $article)
        <section>
            <div class="card-inverse">
                <div class="card-header">
                    {{$article->tytulArt}}
                </div>
                <div class="card-block">
                    <p class="card-text">{{many_word($article->tekstArt,120)}}</p>
                    <a href="/artykuly/{{$article->id}}" class="btn btn-primary">Czytaj więcej</a>
                </div>
            </div>
        </section>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- inde -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-9001339211341884"
             data-ad-slot="5544609031"
             data-ad-format="link"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    @endforeach
@endsection

@section('content')
    @foreach($novelties as $novelty )
        <article>
            <div class="card-inverse ">
                @if(!empty($novelty->zdjecieNews))
                    <div style="position: relative;">
                        <h3 class="title-card">{{$novelty->tytulNews}}</h3>
                        <img class="card-img-top img-responsive img-card" src="{{asset('storage/imagenews/'.$novelty->zdjecieNews)}}"
                             alt="Card image cap">
                    </div>
                @endif
                <div class="card-header">
                    <h3>{{$novelty->podtytulNews}}</h3>
                </div>
                <div class="card-block">
                    <h4 class="card-title"></h4>
                    <p class="card-text">{!! $novelty->tekstNews !!}</p>
                    @if(is_object($novelty->user))
                        <div class="card-text text-right"><small>{!!czas($novelty->dataNews). ' - ' . $novelty->user->name !!}</small></div>
                    @endif
                    <hr>
            </div>
            </div>
        </article>
        <br>
    @endforeach
@endsection
@section('rightContent')
    @foreach($galleries as $gallery)
        <section>
            <div class="card-inverse clearfix">
                <div style="position: relative;width: 100%">
                    <h3 class="title-card">{{$gallery->nazwaGaleria}}</h3>
                    <img class="img-responsive card-img img-card"
                         src="{{asset('storage/wozy/'.$gallery->zdjecieGaleria)}}"
                         alt="Card image cap">
                </div>
                <div class="card-header">
                    {{$gallery->krajGaleria. ' '.$gallery->rokPowstaniaGaleria}}
                </div>
                <div class="card-block">
                    <p class="card-text">{{many_word($gallery->opisGaleria,120)}}</p>
                    <a href="#" class="btn btn-primary">Czytaj więcej</a>

                </div>
            </div>
        </section>
        <br>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- inde -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-9001339211341884"
             data-ad-slot="5544609031"
             data-ad-format="link"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    @endforeach
@endsection

@section('scripts')

@endsection