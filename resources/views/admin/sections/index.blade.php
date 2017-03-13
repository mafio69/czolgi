@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Dodaj dział
    </button>

    @include('admin.layouts.modalDodajSection')

    <table id="tableSection" class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nazwa</th>
            <th>Nadrzędny dział</th>
            <th>Opis</th>
            <th>Akcja</th>
        </tr>
        </thead>
        <tbody>

        @foreach($sections as $section)
            <tr id="row-{{$section->id}}">
                <td scope="row">{{$section->id}}</td>
                <td>{{$section->nazwa}}</td>
                <td>
                    @if(is_object($section->overriding))
                        {{$section->overriding->nazwa}}
                    @else
                        ----
                    @endif
                </td>
                <td>{{$section->opis}}</td>
                <td>
                    <a href="/dzialy/{{$section->id}}/edit" class="btn btn-outline-primary btn-sm">Edytuj</a>
                    <button value="{{$section->id}}" href="/dzialy/{{$section->id}}" class="btn btn-outline-danger btn-sm delete_dzial">Usuń</button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
@section('scripts')

 @endsection