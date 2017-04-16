@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    {{$galleries}}
    <a href="/admin/encyklopedia/create" class="btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true"></i>
        Dodaj wóz</a>
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
                <td>{{$gallery->typGaleria}} <br>
                    @foreach($types_gallery as $type_gallery)
                        @if(!empty($gallery->type_tank_id) && $gallery->type_tank_id == $type_gallery->id)
                            <b>{{$type_gallery->name}}</b>
                        @endif
                    @endforeach
                </td>
                <td>{{$gallery->nazwaGaleria}}</td>
                <td>{{many_word($gallery->opisGaleria,200)}}</td>
                <td><img src="{{asset('storage/wozy/male/'.$gallery->zdjecieGaleria)}}"></td>
                <td>
                    <button href="/admin/encyklopedia/{{$gallery->id}}/edit" value="{{$gallery->id}}"
                            class="btn btn-outline-warning btn-edit"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj
                    </button>
                </td>
                <td>

                    <button value="{{$gallery->id}}" class="btn btn-outline-danger btn-delete">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>Usuń
                    </button>
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>
    {{$galleries}}
@endsection

@include('admin.galleries.include.modalDelete')

@section('scripts')
    <script>
        url = '/admin/encyklopedia';
        $(function () {
            $(document).on('click', '.btn-edit', function () {
                var href = $(this).attr('href');
                window.location.href = href;
            });
            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                var gallery_id = $(this).val();
                $.get(url + '/' + gallery_id + '/dane', function (data) {
                    //success data
                    console.log(data);
                    $('#gallery_id').val(data.id);
                    $('#tytulGallery').text(data.nazwaGaleria);
                    $('#deleteGallery').val(data.id);
                    $('#modalGallery').modal('show');
                });
            });
            $(document).on('click', '#deleteGallery', (function (e) {
                e.preventDefault();
                var gallery_id = $(this).val();
                var formData = {'_token': $('input[name=_token]').val()};
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: "DELETE",
                    url: url + '/' + gallery_id,
                    data: formData,
                    success: function (data) {
                        console.log(data);
                        $("#row" + gallery_id).remove();
                        $('#modalGallery').modal('hide');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }));
        });
    </script>

@endsection
