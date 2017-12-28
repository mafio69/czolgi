@extends('site.layouts.app2')
@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="description-gallery">
        <div class="pull-right">
            @if(is_object($galleryPrev))
                <a title="Poprzedni" class="btn btn-outline-info" href="/encyklopedia/{{$galleryPrev->id}}"> <i
                            class="fa fa-backward" aria-hidden="true"> </i> </a>
            @endif
            <a title="Wróć do zestawienia" class="btn btn-outline-info" href="/encyklopedia"> <i
                        class="fa fa-window-close fa-lg" aria-hidden="true"></i> </a>
            @if(is_object($galleryNext))
                <a title="Następny" class="btn btn-outline-info" href="/encyklopedia/{{$galleryNext->id}}"> <i
                            class="fa fa-forward" aria-hidden="true"> </i> </a>
            @endif
        </div>
        <h1> {{$gallery->nazwaGaleria}}</h1>
        <h1 class="alias">{{$gallery->aliasGaleria}}</h1>
        <div class="gallery-img">
            <img class="img-responsive img-img img-fluid" src="{{asset('storage/wozy/'.$gallery->zdjecieGaleria)}}"
                 alt="Card image cap">
        </div>
        <div class="text-right gallery-item">
            {{$gallery->krajGaleria}}<br>
            {{$gallery->typeTank->name}}<br>
            {{$gallery->rokPowstaniaGaleria}}
        </div>
        <div class="">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Opis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Dane</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">{!!  $gallery->opisGaleria!!}</div>
                <div class="tab-pane" id="profile" role="tabpanel">
                    <pre>{{$gallery->daneGaleria}}</pre>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="pull-right">
        @if(is_object($galleryPrev))
            <a title="Poprzedni" class="btn btn-outline-info" href="/encyklopedia/{{$galleryPrev->id}}"> <i
                        class="fa fa-backward" aria-hidden="true"> </i> </a>
        @endif
        <a title="Wróć do zestawienia" class="btn btn-outline-info" href="/encyklopedia"> <i
                    class="fa fa-window-close fa-lg" aria-hidden="true"></i> </a>
        @if(is_object($galleryNext))
            <a title="Następny" class="btn btn-outline-info" href="/encyklopedia/{{$galleryNext->id}}"> <i
                        class="fa fa-forward" aria-hidden="true"> </i> </a>
        @endif
    </div>
    <br><br>
    <button type="button" class="btn btn-outline-success pull-right" data-toggle="modal" data-target="#myModal">
        Dodaj Komentarz
    </button>
    <br>
    <br>
    <h3>Komentarze</h3>
    <div id="comments">
        @foreach($comments as $comment)
            <div class="card-inverse">
                <div class="card-header">
                    {{$comment->tytulKom}}
                </div>
                <div class="card-block">
                    <p class="card-text">{{$comment->tekstKom}} </p><br>
                    <div class="text-right">
                        {{$comment->autorKom}}<br>
                        {{$comment->dataKom}}<br>
                    </div>


                </div>
            </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-outline-success pull-right" data-toggle="modal" data-target="#myModal">
        Dodaj Komentarz
    </button>
    <br><br>
    <div class="pull-right">
        @if(is_object($galleryPrev))
            <a title="Poprzedni" class="btn btn-outline-info" href="/encyklopedia/{{$galleryPrev->id}}"> <i
                        class="fa fa-backward" aria-hidden="true"> </i> </a>
        @endif
        <a title="Wróć do zestawienia" class="btn btn-outline-info" href="/encyklopedia"> <i
                    class="fa fa-window-close fa-lg" aria-hidden="true"></i> </a>
        @if(is_object($galleryNext))
            <a title="Następny" class="btn btn-outline-info" href="/encyklopedia/{{$galleryNext->id}}"> <i
                        class="fa fa-forward" aria-hidden="true"> </i> </a>
        @endif
    </div>
@endsection
@section('rightContent')
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
    @include('site.layouts.inc.commentModal')
@endsection
@section('scripts')
    <script src="/js/comment.js"></script>

@endsection