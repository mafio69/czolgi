@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{url('/admin/artykuly/'.$article->id)}}">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="section">Dział</label>
            <select  class="form-control" name="section_id" id="section_id" aria-describedby="sectionHelp" placeholder="">
                @foreach($sections as $section)
                    <option {{$section->id ==$article->section_id ? 'selected': ''}} value="{{$section->id}}">{{$section->nazwa}}</option>
                @endforeach
            </select>
            <small id="sectionHelp" class="form-text text-muted">Wybierz dział artykułu</small>
            @if ($errors->has('section'))
                <span class="help-block">
                   <strong>{{ $errors->first('section') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="user">Autor</label>
            <select  class="form-control" name="user_id" id="user_id" aria-describedby="userHelp" placeholder="">
                @foreach($users as $user)
                    <option {{$user->id ==$article->user_id ? 'selected': ''}} value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <small id="userHelp" class="form-text text-muted">Wybierz autora</small>
            @if ($errors->has('user'))
                <span class="help-block">
                   <strong>{{ $errors->first('user_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="tytulArt">Tytuł artykułu</label>
            <input required  value="{{$article->tytulArt}}" type="text" class="form-control" id="tytulArt" aria-describedby="tytulArtlHelp" name="tytulArt" placeholder="Wpisz tytuł">
            <small id="tytulArtHelp" class="form-text text-muted">Wpisz tytuł artykułu.</small>
            @if ($errors->has('tytulArt'))
                <span class="help-block">
                   <strong>{{ $errors->first('tytulArt') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="podtytulArt">Podtytuł artykułu</label>
            <input required  value="{{$article->podtytulArt}}" type="text" class="form-control" id="podtytulArt"  name="podtytulArt"aria-describedby="podtytulArtlHelp" placeholder="Wpisz tytuł">
            <small id="podtytulArtHelp" class="form-text text-muted">Wpisz drugi tytuł artykułu.</small>
            @if ($errors->has('podtytulArt'))
                <span class="help-block">
                   <strong>{{ $errors->first('podtytulArt') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="tekstArt">Tekst artykułu</label>
            <textarea required  rows="20" type="text" class="form-control" id="tekstArt" name="tekstArt" aria-describedby="tekstArtlHelp" placeholder="Wpisz tekst artykułu">{{$article->tekstArt}}</textarea>
            <small id="tekstArtHelp" class="form-text text-muted">Wpisz tekst artykułu.</small>
            @if ($errors->has('tekstArt'))
                <span class="help-block">
                   <strong>{{ $errors->first('tekstArt') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="dataWydarzeniaArt">Data wydarzenia</label>
            <input required value="{{$article->dataWydarzeniaArt}}" type="date" class="form-control" id="dataWydarzeniaArt" name="dataWydarzeniaArt" aria-describedby="dataWydarzeniaArtlHelp" placeholder="RRRR-MM-DD">
            <small id="dataWydarzeniaArtHelp" class="form-text text-muted">Wybierz datę której dotyczy artykuł artykułu.</small>
            @if ($errors->has('dataWydarzeniaArt'))
                <span class="help-block">
                   <strong>{{ $errors->first('dataWydarzeniaArt') }}</strong>
                </span>
            @endif
        </div>



        <button type="submit" id="btnSaveCreate" value="btnSaveCreate">Zapisz</button>
    </form>

@endsection

@section('scripts')

@endsection