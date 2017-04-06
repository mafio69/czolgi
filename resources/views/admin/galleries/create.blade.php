@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ol>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif

    <form method="post" action="/admin/encyklopedia" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="nazwaGaleria" class="col-2 col-form-label">Nazwa Czołgu</label>
            <div class="col-10">
                <input class="form-control{{ $errors->has('nazwaGaleria') ? ' input-error' : '' }}"  name="nazwaGaleria" type="text" value="{{old('nazwaGaleria')}}" id="nazwaGaleria"
                       placeholder="Wpisz nazwę czołgu">
                @if ($errors->has('nazwaGaleria'))
                    <div class="margines-gora">
                         <strong class="bg-red-input text-white">{{ $errors->first('nazwaGaleria') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Aliasy czołgu</label>
            <div class="col-10">
                <input class="form-control{{ $errors->has('aliasGaleria') ? ' input-error' : '' }}" name="aliasGaleria" type="text" value="{{old('aliasGaleria')}}" id="aliasGaleria"
                       placeholder="Wpisz inne nazwy czołgu">
                @if ($errors->has('aliasGaleria'))
                    <div class="margines-gora">
                         <strong class="bg-red-input text-white" >{{ $errors->first('aliasGaleria') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Kraj </label>
            <div class="col-10">
                <input class="form-control{{ $errors->has('krajGaleria') ? ' input-error' : '' }} " name="krajGaleria" type="text" value="{{old('krajGaleria')}}" id="krajGaleria"
                       placeholder="Wpisz kraj pochodzenia czołgu">
                @if ($errors->has('krajGaleria'))
                    <div class="margines-gora">
                        <strong class="bg-red-input text-white" >{{ $errors->first('krajGaleria') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Typ wozu </label>
            <div class="col-10">
                <select class="form-control{{ $errors->has('type_tank_id') ? ' input-error' : '' }}" id="type_tank_id" name="type_tank_id">
                    <option>Wybierz typ czołgu</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('type_tank_id'))
                    <div class="margines-gora">
                        <strong class="bg-red-input text-white" >{{ $errors->first('type_tank_id') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="zdjecieGaleria" class="col-2 col-form-label">Zdjęcie Czołgu</label>
            <div class="col-10">
                <input type="file" name="zdjecieGaleria" class="form-control-file {{ $errors->has('zdjecieGaleria') ? ' input-error' : '' }}" id="zdjecieGaleria">
                @if ($errors->has('zdjecieGaleria'))
                    <div class="margines-gora">
                        <strong class="bg-red-input text-white" >{{ $errors->first('zdjecieGaleria') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Opis </label>
            <div class="col-10">
                <textarea class="form-control {{ $errors->has('opisGaleria') ? ' input-error' : '' }}" name="opisGaleria" value="{{old('opisGaleria')}}" rows="10" id="opisGaleria"
                          placeholder="Opisz czołg">{{old('opisGaleria')}}</textarea>
                @if ($errors->has('opisGaleria'))
                    <div class="margines-gora">
                        <strong class="bg-red-input text-white" >{{ $errors->first('opisGaleria') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Dane </label>
            <div class="col-10">
                <textarea class="form-control{{ $errors->has('daneGaleria') ? ' input-error' : '' }}" name="daneGaleria" value="{{old('daneGaleria')}}" rows="10" id="daneGaleria"
                          placeholder="Dane czołgu">{{old('daneGaleria')}}</textarea>
                @if ($errors->has('daneGaleria'))
                    <div class="margines-gora">
                        <strong class="bg-red-input text-white" >{{ $errors->first('daneGaleria') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Rok powstania </label>
            <div class="col-10">
                <input class="form-control {{ $errors->has('rokPowstaniaGaleria') ? ' input-error' : '' }}" name="rokPowstaniaGaleria" type="text" value="{{old('rokPowstaniaGaleria')}}" id="rokPowstaniaGaleria"
                       placeholder="Wpisz rok powstania czołgu RRRR">
                @if ($errors->has('rokPowstaniaGaleria'))
                    <div class="margines-gora">
                        <strong class="bg-red-input text-white" >{{ $errors->first('rokPowstaniaGaleria') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <input type="submit" class="btn btn-outline-primary" value="Dodaj czołg">
        {{csrf_field()}}
    </form>

@endsection

@section('scripts')

@endsection