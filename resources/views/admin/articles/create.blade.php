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
    <form method="post" action="{{url('/admin/artykuly')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="section">Dział</label>
            <select  class="form-control" name="section_id" id="section_id" aria-describedby="sectionHelp" placeholder="">
                @foreach($sections as $section)
                    <option value="{{$section->id}}">{{$section->nazwa}}</option>
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
            <label for="tytulArt">Tytuł artykułu</label>
            <input required  value="{{old('tytulArt')}}" type="text" class="form-control" id="tytulArt" aria-describedby="tytulArtlHelp" name="tytulArt" placeholder="Wpisz tytuł">
            <small id="tytulArtHelp" class="form-text text-muted">Wpisz tytuł artykułu.</small>
            @if ($errors->has('tytulArt'))
                <span class="help-block">
                   <strong>{{ $errors->first('tytulArt') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="podtytulArt">Podtytuł artykułu</label>
            <input required  value="{{old('podtytulArt')}}" type="text" class="form-control" id="podtytulArt"  name="podtytulArt"aria-describedby="podtytulArtlHelp" placeholder="Wpisz tytuł">
            <small id="podtytulArtHelp" class="form-text text-muted">Wpisz drugi tytuł artykułu.</small>
            @if ($errors->has('podtytulArt'))
                <span class="help-block">
                   <strong>{{ $errors->first('podtytulArt') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="tekstArt">Tekst artykułu</label>
            <textarea required  rows="20" type="text" class="form-control" id="tekstArt" name="tekstArt" aria-describedby="tekstArtlHelp" placeholder="Wpisz tekst artykułu">{{old('tekstArt')}}</textarea>
            <small id="tekstArtHelp" class="form-text text-muted">Wpisz tekst artykułu.</small>
            @if ($errors->has('tekstArt'))
                <span class="help-block">
                   <strong>{{ $errors->first('tekstArt') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="dataWydarzeniaArt">Data wydarzenia</label>
            <input required value="{{old('dataWydarzeniaArt')}}" type="date" class="form-control" id="dataWydarzeniaArt" name="dataWydarzeniaArt" aria-describedby="dataWydarzeniaArtlHelp" placeholder="RRRR-MM-DD">
            <small id="dataWydarzeniaArtHelp" class="form-text text-muted">Wybierz datę której dotyczy artykuł artykułu.</small>
            @if ($errors->has('dataWydarzeniaArt'))
                <span class="help-block">
                   <strong>{{ $errors->first('dataWydarzeniaArt') }}</strong>
                </span>
            @endif
        </div>

        <input type="hidden" name="user_id" value="{{auth()->id()}}">
        <input type="hidden" name="dataArt" value="{{date('Y-m-d')}}">

        <button type="submit" id="btnSaveCreate" value="btnSaveCreate">Zapisz</button>
    </form>

@endsection

@section('scripts')

@endsection