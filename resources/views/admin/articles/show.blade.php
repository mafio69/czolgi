@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')

       <h2>{!! $article->tytulArt!!}</h2>
        <div>
            {!! $article->tekstArt !!}
        </div>

@endsection

@section('scripts')

@endsection