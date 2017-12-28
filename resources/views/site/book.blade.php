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
    <button type="button" class="btn btn-primary margin-b pull-right" data-toggle="modal" data-target="#BookModal">
        Dopisz się
    </button>
    {{$books}}



    <article id="contentBook">
        @foreach($books as $book )
            <section>
                <div class="card-inverse ">

                    <div class="card-header">
                        <h3>{{$book->imieKsiega}}</h3>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title"></h4>
                        <p class="card-text">{{$book->trescKsiega}} </p>
                        <div class="text-sm-right  male">{{$book->dataKsiega}}  {{$book->wwwKsiega ? ' | '.$book->wwwKsiega : ''}} {{$book->mailKsiega ? ' | '.$book->mailKsiega : ''}}</div>
                        <hr>
                    </div>
                </div>
            </section>
            <br>
        @endforeach
    </article>
    <button type="button" class="btn btn-primary margin-b pull-right" data-toggle="modal" data-target="#BookModal">
        Dopisz się
    </button>
    {{$books}}


    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="BookModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dopisz się do Księgi Gości</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="book-errors"></div>
                    <form id="formBook">
                        <div class="form-group">
                            <label for="imieKsiega">Imie</label>
                            <input type="email" class="form-control" id="imieKsiega" aria-describedby="emailHelp"
                                   placeholder="Wpisz swoje imie. WYMAGANE" required>
                        </div>
                        <div class="form-group">
                            <label for="mailKsiega">Email adres</label>
                            <input type="email" class="form-control" id="mailKsiega" aria-describedby="emailHelp"
                                   placeholder="Możesz dodać adres email">
                        </div>
                        <div class="form-group">
                            <label for="wwwKsiega">Strona web</label>
                            <input type="url" class="form-control" id="wwwKsiega" aria-describedby="emailHelp"
                                   placeholder="Możesz dodać adres www">
                        </div>
                        <div class="form-group">
                            <label for="trescKsiega">Treść wpisu</label>
                            <textarea rows="6" type="url" class="form-control" id="trescKsiega"
                                      aria-describedby="emailHelp" placeholder="Wpisz tresc. WYMAGANE"
                                      required></textarea>
                        </div>
                        <input type="hidden" name="" id="dataKsiega" value="{{date('Y-m-d H:i:s')}}">
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                    <button type="button" id="bookSave" class="btn btn-primary">Zapisz</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bookInfo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Stara przeglądarka</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Twoja przeglądarka jest przestarzała , nie które funkcje mogą nie działać.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                </div>
            </div>
        </div>
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
    <script src="/js/book.js"></script>
@endsection