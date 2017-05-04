@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    @if(!empty($novelty->zdjecieNews))
        <img src="{{asset('storage/imagenews/'.$novelty->zdjecieNews)}}">
    @endif
    <form action="/admin/nowosci/storeimg/{{$novelty->id}}" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            {{csrf_field()}}
            {{method_field('patch')}}


            <label for="InputFile">Dodaj obrazek do {{$novelty->tytulNews}}</label>
            <input type="file" class="form-control-file" name="zdjecieNews" id="InputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Dodaj obrazek do News</small>
        </div>
        <button type="submit" class="btn btn-primary" value="Zapisz"> Zapisz</button>
    </form>
@endsection

@section('scripts')

@endsection