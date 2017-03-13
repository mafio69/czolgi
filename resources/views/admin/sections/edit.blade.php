@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    <form method="post" action="{{url('dzialy/'.$section->id)}}">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="form-group">
            <input type="hidden" value="{{$section->id}}" id="dzial_id">
            <label for="nazwa">Nazwa</label>
            <input type="text" class="form-control" id="nazwa" value="{{$section->nazwa}}" aria-describedby="nazwaHelp"
                   name="nazwa" placeholder="Wpisz nazwę działu">
            <small id="nazwaHelp" class="form-text text-muted">Wpisz poprawną nazwę.</small>
        </div>
        <div class="form-group">
            <label for="nazwa">Opis</label>
            <textarea type="text" class="form-control" id="opis"  aria-describedby="opisHelp"
                      name="opis" placeholder="Wpisz opis">{{$section->opis}}
            </textarea>
            <small id="opisHelp" class="form-text text-muted">Wprowadź krótki opis.</small>
        </div>
        <div class="form-group">
            <label for="nazwa">Dział nadrzędny</label>
            <select name="overriding" id="overriding_id" class="form-control">
                @foreach($sections as $sect)
                <option class="form-control" {{$sect->id == $section->overriding_id ? 'selected' : ''}} id="nazwa" value="{{$sect->id}}" aria-describedby="overridingHelp"
                        name="overriding" placeholder="Wybierz dział nadrzędny">
                    {{$sect->nazwa}}
                </option>
                 @endforeach
            </select>
            <small id="overridingHelp" class="form-text text-muted">Wybierz dział nadrzędny.</small>
        </div>
        <div class="form-group">
            <button id="btn-update" class="btn btn-primary" value="Popraw">Popraw</button>
        </div>
    </form>
@endsection

@section('scripts')

@endsection