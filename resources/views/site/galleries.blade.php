@extends('site.layouts.app2')
@section('title')
    {{$title}}
@endsection

@section('content')
    {{$galleries}}
    <table class="table table-sm table-hover table-responsive table-striped">
        <thead>
        <tr>
            <th>Nazwa czołgu</th>
            <th>Typ czołgu</th>
            <th>Opis czołgu</th>
            <th>Zdjęcie</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($articlesS))
            <h3>Znalezione w encyklopedii</h3>
        @endif
        @foreach($galleries as $gallery)
            <tr id="row{{$gallery->id}}">
                <td><b><a href="/encyklopedia/{{$gallery->id}}">{{$gallery->nazwaGaleria}}</a></b><br>
				{{$gallery->rokPowstaniaGaleria}}
				</td>
                <td>
                    @if (is_object($gallery->typeTank))
                        <b>{{$gallery->typeTank->name}}</b>
                    @endif
                </td>
                <td>{{many_word($gallery->opisGaleria,200)}}</td>
                <td><a href="/encyklopedia/{{$gallery->id}}"><img src="{{asset('storage/wozy/male/'.$gallery->zdjecieGaleria)}}"></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if(isset($articlesS))
        <h3>Znalezione w artykułach</h3>
        @foreach($articlesS as $article1)
            <section>
                <div class="card-inverse">
                    <div class="card-header">
                        {{$article1->tytulArt}}
                    </div>
                    <div class="card-block">
                        <p class="card-text">{{many_word($article1->tekstArt,120)}}</p>
                        <a href="/artykuly/{{$article1->id}}" class="btn btn-primary">Czytaj więcej</a>
                    </div>
                </div>
            </section>

        @endforeach
    @endif

    {{$galleries}}
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
@endsection
@section('scripts')

@endsection