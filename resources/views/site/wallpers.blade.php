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
                    <a href="#" class="btn btn-primary">Czytaj więcej</a>
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
    <div class="row justify-content-around" >
        @foreach($obrazki as $tapeta)
            <div class="col" id="tapety">
                <a href="{{asset('storage/wallpers/duze/'.$tapeta)}}" class="anchor_img"  title="Duża tapeta">
				<img class="wallpers_img " src="{{asset('storage/wallpers/male/'.$tapeta)}}"
                            alt="Czolgi.info">
				</a>
                <div class="text-center">
                    <a href="{{asset('storage/wallpers/duze/'.$tapeta)}}" class="text-center"
                       download="{{asset('storage/wallpers/duze/'.$tapeta)}}" title="pobierz">
                        <i class="fa fa-download"></i> Pobierz </a>
                </div>
            </div>
        @endforeach
    </div>
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
                    <a href="/encyklopedia/{{$gallery->id}}" class="btn btn-primary">Czytaj więcej</a>

                </div>
            </div>
        </section>
        <br>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- GaleriaRes -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-9001339211341884"
             data-ad-slot="5694684637"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    @endforeach
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.tosrus.all.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.anchor_img').tosrus({
   
 
   effect     : "fade",
   buttons    : "inline",
   pagination : {
      add        : true,
	  type        :"bullets"
   },
   wrapper    : {
      classes    : "img-border"
   }

});
        });
    </script>
	
@endsection