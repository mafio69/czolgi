@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    {{$galleries}}
    <a href="/admin/encyklopedia/create" class="btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj wóz</a>
    <table class="table table-sm table-hover table-responsive table-striped">
        <thead>
        <tr>
            <th>Typ czołgu</th>
            <th>Nazwa czołgu</th>
            <th>Opis czołgu</th>
            <th>Zdjęcie</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
        </thead>
        <tbody>

            @foreach($galleries as $gallery)
             <tr id="row{{$gallery->id}}">
                <th>{{$gallery->typGaleria}}</th>
                <td>{{$gallery->nazwaGaleria}}</td>
                <td>{{many_word($gallery->opisGaleria,200)}}</td>
                <td><img src="/wozy/male/{{$gallery->zdjecieGaleria}}"></td>
                 <td>
                     <button href="/admin/encyklopedia/{{$gallery->id}}/edit" value="{{$gallery->id}}" class="btn btn-outline-warning btn-edit"><i
                                 class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj
                     </button>
                 </td>
                 <td>

                     <button value="{{$gallery->id}}" value="{{$gallery->id}}" class="btn btn-outline-danger btn-delete">
                         <i class="fa fa-trash-o" aria-hidden="true"></i>Usuń
                     </button>
                 </td>
            </tr>
            @endforeach


        </tbody>
    </table>
    {{$galleries}}
@endsection

@section('scripts')
    <script>
        url= '/admin/encyklopedia'
        $(function () {
          $(document).on('click','.btn-edit',function () {
             var href= $(this).attr('href');
              window.location.href = href;
          })
        })
    </script>

@endsection