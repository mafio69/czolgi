@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    {{$novelties}}
    <button id="addNews" value="" class="btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj
        News
    </button>
    <table class="table table-striped table-responsive table-hover">
        <thead>
        <tr>

            <th>Tytuł News</th>
            <th>Podtytuł News</th>
            <th>Tekst News</th>
            <th>Data News</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
        </thead>
        <tbody id="start_table">
        @foreach($novelties as $novelty)
            <tr id="row{{$novelty->id}}">

                <td>{{$novelty->tytulNews}}</td>
                <td>{{$novelty->podtytulNews}}</td>
                <td>{{many_word($novelty->tekstNews,120)}}</td>
                <td>{{$novelty->dataNews}}</td>
                <td>
                    <button value="{{$novelty->id}}" class="btn btn-outline-warning btn-edit"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj
                    </button>
                </td>
                <td>
                    <button value="{{$novelty->id}}" class="btn btn-outline-danger btn-delete">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>Usuń
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$novelties}}
    @include('admin.novelties.include.modalAddNovelty')

    @include('admin.novelties.include.modalEditNovelty')

    @include('admin.novelties.include.modalDeleteNovelty')
@endsection

@section('scripts')
    <script>
        url = '/admin/nowosci'
        $(function () {
            $(document).on('click', '#addNews', function () {
                $('#myModalAdd').modal('show');
            });
            $(document).on('click', '#btn-save-add', function (e) {
                e.preventDefault();
                var formData = {
                    'user_id': $('#user_id').val(),
                    'tytulNews': $('#tytulNews').val(),
                    'podtytulNews': $('#podtytulNews').val(),
                    'tekstNews': $('#tekstNews').val(),
                    'dataNews': $('#dataNews').val(),
                    '_token': $('input[name=_token]').val(),
                };
                console.log(formData);
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        var novelty = '<tr id="row' + data.id + '" class="corrected"><td>' + data.tytulNews + '</td>';
                        novelty += '<td>' + data.podtytulNews + '</td><td>' + data.tekstNews + '</td><td>' + data.dataNews + '</td>';
                        novelty += '<td><button value="' + data.id + '" class="btn btn-outline-warning btn-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj</button></td>';
                        novelty += ' <td><button value="' + data.id + '" class="btn btn-outline-danger btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Usuń</button></td></tr>';

                        $("#start_table").prepend(novelty);
                        $('#formAdd').trigger("reset");
                        $('#myModalAdd').modal('hide')
                    },
                    error: function (xhr) {
                        if (xhr.status == 422) {
                            //process validation errors here.
                            var errors = jQuery.parseJSON(xhr.responseText);//this will get the errors response data.
                            //show them somewhere in the markup
                            //e.g
                            console.log(errors);
                            var errorsHtml = '<div class="alert alert-danger"><ul class="list-group">';

                            $.each(errors, function (key, value) {
                                errorsHtml += '<li class="list-group-item">' + value[0] + '</li>'; //showing only the first error.
                            });
                            errorsHtml += '</ul></di>';

                            $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
                        } else {
                            var errors = jQuery.parseJSON(xhr.responseText);
                            console.log('Error:', errors);
                        }
                    }

                })
            })
            $(document).on('click', '.btn-edit', function (e) {
                e.preventDefault();
                $('#userEdit').html('');
                $('#formErrorsEdit').html('');
                var nev_id = $(this).val();
                $.get(url + '/' + nev_id, function (data) {
                    console.log(data);
                    $('#tytulNewsEdit').val(data.tytulNews);
                    $('#podtytulNewsEdit').val(data.podtytulNews);
                    $('#tekstNewsEdit').val(data.tekstNews);
                    $('#idNewsEdit').val(data.id);
                    var opcje = '<select id="user_id" class="form-control" name="user_id">';
                    ;
                    data.users.forEach(function (element) {
                        console.log(element);
                        opcje += '<option ';
                        if (element.id == data.user_id) {
                            opcje += ' selected ';
                            //console.log(element.id + ' = '+data.overriding_id);
                        }
                        opcje += 'value="' + element.id + '">' + element.name + '</option>';

                    })
                    opcje += '</select>';
                    $('#userEdit').append(opcje);

                    $('#myModalEdit').modal('show');

                })

            })

            $(document).on('click', '#btn-save-edit', function (e) {
                e.preventDefault();
                var formData = {
                    'user_id': $('#user_id').val(),
                    'tytulNews': $('#tytulNewsEdit').val(),
                    'podtytulNews': $('#podtytulNewsEdit').val(),
                    'tekstNews': $('#tekstNewsEdit').val(),
                    '_token': $('input[name=_token]').val(),
                    'idNews': $('#idNewsEdit').val()
                };
                var idNews = $('#idNewsEdit').val();
                var my_url = url + '/' + idNews;
                console.log(formData);
                $.ajax({
                    type: 'PUT',
                    url: my_url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log('wszystko ok');
                        console.log(data);
                        var novelty = '<tr id="row' + data.id + '" class="corrected"><td>' + data.tytulNews + '</td>';
                        novelty += '<td>' + data.podtytulNews + '</td><td>' + data.tekstNews + '</td><td>' + data.dataNews + '</td>';
                        novelty += '<td><button value="' + data.id + '" class="btn btn-outline-warning btn-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj</button></td>';
                        novelty += ' <td><button value="' + data.id + '" class="btn btn-outline-danger btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Usuń</button></td></tr>';

                        $("#row" + data.id).replaceWith(novelty);
                        $('#formEdit').trigger("reset");
                        $('#userEdit').html('');
                        $('#myModalEdit').modal('hide')
                    },
                    error: function (xhr) {
                        if (xhr.status == 422) {
                            //process validation errors here.
                            var errors = jQuery.parseJSON(xhr.responseText);//this will get the errors response data.
                            //show them somewhere in the markup
                            //e.g
                            console.log(errors);
                            var errorsHtml = '<div class="alert alert-danger"><ul class="list-group">';

                            $.each(errors, function (key, value) {
                                errorsHtml += '<li class="list-group-item">' + value[0] + '</li>'; //showing only the first error.
                            });
                            errorsHtml += '</ul></di>';

                            $('#formErrorsEdit').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
                        } else {
                            var errors = jQuery.parseJSON(xhr.responseText);
                            console.log('Error:', errors);
                            console.log('Error:', data);
                        }
                    }

                })
            })

            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                var novelty_id = $(this).val();
                $.get(url + '/' + novelty_id, function (data) {
                    //success data
                    console.log(data);
                    $('#novelty_id').val(data.id);
                    $('#tytulNovelty').text(data.tytulNews);
                    $('#deleteNovelty').val(data.id);


                    $('#modalDeleteNovelty').modal('show');
                })
            });
            //delete task and remove it from list
            $('#deleteNovelty').click(function (e) {
                var novelty_id = $(this).val();
                e.preventDefault();
                var formData ={ '_token': $('input[name=_token]').val()};
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: "DELETE",
                    url: url + '/' + novelty_id,
                    data: formData,

                    success: function (data) {
                        console.log(data);
                        $("#row" + novelty_id).remove();
                        $('#modalDeleteNovelty').modal('hide');
                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

        })
    </script>

@endsection