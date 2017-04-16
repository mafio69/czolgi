@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    <button type="button" id="add" class="btn btn-outline-primary" data-toggle="modal">
        <i class="fa fa-plus" aria-hidden="true"></i> Dodaj typ czołgu
    </button>

    <table id="tabletypeTank" class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nazwa</th>
            <th>Akcja</th>
            <th>Akcja</th>
        </tr>
        </thead>
        <tbody id="tableAdd">

        @foreach($typeTanks as $typeTank)
            <tr id="row{{$typeTank->id}}">
                <td scope="row">{{$typeTank->id}}</td>
                <td>{{$typeTank->name}}</td>

                <td>
                    <button href="/admin/typyCzolgow/{{$typeTank->id}}/edit" value="{{$typeTank->id}}"
                            class="btn btn-outline-warning edit-typCzolgu btn-sm"><i class="fa fa-pencil-square-o"
                                                                                     aria-hidden="true"></i> Edytuj
                    </button>

                </td>
                <td>
                    <button value="{{$typeTank->id}}" href="/admin/typyCzolgow/{{$typeTank->id}}"
                            class="btn btn-outline-danger btn-sm delete-typCzolgu" id="{{$typeTank->id}}"><i
                                class="fa fa-trash-o"
                                aria-hidden="true"></i> Usuń
                    </button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection

@include('admin.TypeTanks.include.modalAdd')

@include('admin.TypeTanks.include.delete')

@section('scripts')
    <script>

        $(function () {
            var url = '/admin/typyCzolgow'
            $(document).on('click', '#add', function (e) {
                e.preventDefault();
                $('#form-errors').html('');
                $('#btn-save').val('Dodaj').text('Dodaj');
                $('#formModal').trigger("reset");
                $('#ModalLabel').html('Dodaj Typ Czołgu');

                $('#ModalAdd').modal('show');

            })
            $(document).on('click', '.edit-typCzolgu', function (e) {
                e.preventDefault();
                var typ_id = $(this).val();
                $('#form-errors').html('');
                $('#btn-save').val('Popraw').text('Popraw');
                $('#formModal').trigger("reset");
                $('#ModalLabel').html('Popraw Typ Czołgu');

                var my_url = url + '/' + typ_id;
                console.log(my_url);
                $.get(my_url, function (data) {
                    console.log(data);
                    $('#nameAdd').val(data.name);
                    $('#idTyp').val(data.id);
                    $('#ModalAdd').modal('show');
                });

            })
            $(document).on('click', '#btn-save', function () {
                var formData = {
                    'name': $('#nameAdd').val(),
                    '_token': $('input[name=_token]').val(),
                };
                console.log(formData);
                var typ_btn = $('#btn-save').val();
                var id_typ = $('#idTyp').val();
                var typ;
                if (typ_btn == 'Dodaj') {
                    typ = 'POST';
                    var my_url = url;
                } else if (typ_btn == 'Popraw') {
                    typ = 'PUT';
                    var my_url = url + '/' + id_typ;
                }

                $.ajax({
                    type: typ,
                    url: my_url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        var typeTank = '<tr id="row' + data.id + '" ><td>' + data.id + '</td><td>' + data.name + '</td>';
                        typeTank += '<td> <button href="/admin/typyCzolgow/{{$typeTank->id}}/edit" value="{{$typeTank->id}}" class="btn btn-outline-warning edit-typCzolgu btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj</button>';
                        typeTank += '</td><td><button value="{{$typeTank->id}}" href="/admin/typyCzolgow/{{$typeTank->id}}" class="btn btn-outline-danger btn-sm delete-typCzolgu" id="usun"><i class="fa fa-trash-o" aria-hidden="true"></i> Usuń</button> </td> </tr>';

                        if (typ == 'POST') {
                            $("#tableAdd").prepend(typeTank);
                        } else if (typ == 'PUT') {
                            $("#row" + id_typ).replaceWith(typeTank);
                        }
                        $('#formModal').trigger("reset");
                        $('#ModalAdd').modal('hide')
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

            $(document).on('click', '.delete-typCzolgu', function (e) {
                e.preventDefault();
                var typCzolgu_id = $(this).val();
                $.get(url + '/' + typCzolgu_id, function (data) {
                    //success data
                    console.log(data);
                    $('#typCzolgu_id').val(data.id);
                    $('#nameDelete').text(data.name);
                    $('#delete').val(data.id);


                    $('#modalDelete').modal('show');
                })
            });

            $('#delete').click(function (e) {
                var typCzolgu_id = $(this).val();
                e.preventDefault();
                var formData = {'_token': $('input[name=_token]').val()};
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: "DELETE",
                    url: url + '/' + typCzolgu_id,
                    data: formData,

                    success: function (data) {
                        console.log(data);
                        $("#row" + typCzolgu_id).remove();
                        $('#modalDelete').modal('hide');
                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

        })
    </script>

@endsection