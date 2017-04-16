@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    {{$questbooks}}
    <table class="table table-responsive table-striped">
        <tr>
            <th>Id wpisu</th>
            <th>Dane</th>
            <th>Treść</th>
            <th>Aprobata</th>
            <th>Usuń</th>
        </tr>
        @foreach($questbooks as  $questbook)
            <tr id="row-{{$questbook->id}}">
                <td>{{$questbook->id}}</td>
                <td>{{$questbook->infoKsiega}}<br>
                    {{$questbook->dataKsiega}}<br>
                    {{$questbook->imieKsiega}}
                </td>
                <td>{{$questbook->trescKsiega}}</td>
                <td style="white-space:nowrap;">
                    <form action="admin/ksiegagosci/{{$questbook->id}}/zmien" method="post">
                        {{csrf_field()}}
                        <div class="form-check ">
                            <button class="btn btn-outline-primary btn-change btn-sm" type="submit"
                                    value="{{$questbook->id}}"><i class="fa fa-eye-slash" aria-hidden="true"></i> Zmień
                            </button>
                        </div>
                        <div class="form-check ">
                            <label class="form-check-label">
                                <input class="form-check-input choice" type="radio"
                                       {{$questbook->aprobataKsiega == 0 ? 'checked' : ''}} name="aprobataKsiega"
                                       id="aprobataKsiega1"
                                       value="0"> nie widoczny
                            </label>
                        </div>
                        <div class="form-check ">
                            <label class="form-check-label">
                                <input class="form-check-input choice"
                                       {{$questbook->aprobataKsiega > 0 ? 'checked' : ''}} type="radio"
                                       name="aprobataKsiega"
                                       id="aprobataKsiega2" value="1"> widoczny
                            </label>
                        </div>
                    </form>

                </td>
                <td>
                    <form>
                        {{csrf_field()}}
                        <input type="hidden" id="tekstKsiegaD{{$questbook->id}}"
                               value="{{ many_word($questbook->trescKsiega,220)}}">
                        <input type="hidden" id="autorKsiegaD{{$questbook->id}}" value="{{$questbook->imieKsiega}}">
                        <button class="btn btn-delete btn-sm btn-outline-danger" value="{{$questbook->id}}"><i
                                    class="fa fa-trash" aria-hidden="true"></i> Usuń
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{$questbooks}}
@endsection
@include('admin.Questbooks.includes.delete')
@section('scripts')
    <script>
        var url = "/admin/ksiega-gosci"
        $(function () {
            $(document).on('click', '.btn-change', function (e) {

                e.preventDefault();
                var id_questbook = $(this).val();

                var formData = {
                    '_token': $('input[name=_token]').val(),
                    'aprobataKsiega': $('.choice:checked').val(),
                };
                console.log(formData);
                $.post(url + '/' + id_questbook + '/zmien', formData)
                    .done(function (data) {
                        var aprobata = "nie widoczny";
                        if (data.aprobataKsiega > 0) {
                            aprobata = "widoczny";
                        }
                        var message = '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        message += '   <span aria-hidden="true">&times;</span> </button> Zmieniono widoczność na :<b> ' + aprobata + '</b> </div>';
                        $('#meesage').html(message);
                        console.log("Zmieniono widoczność wpisu księgi." + data);
                    }).fail(function () {
                    alert("Nie udało sie zmienić widoczności wpisu księgi");
                });

            })

            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                var id_questbook = $(this).val();

                var tekstKsiega = $('#tekstKsiegaD' + id_questbook).val();
                var autorKsiega = $('#autorKsiegaD' + id_questbook).val();


                $('#tekstKsiega').text(tekstKsiega);
                $('#autorKsiega').text(autorKsiega);
                $('#delete').val(id_questbook);

                console.log(url + ' / ' + id_questbook);
                $('#modalDelete').modal('show');
            });
            $(document).on('click', '#delete', function (e) {
                e.preventDefault();
                var formData = {'_token': $('input[name=_token]').val()};
                id_questbook = $(this).val();
                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: "DELETE",
                    url: url + '/' + id_questbook,
                    data: formData,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        $("#row-" + id_questbook).remove();

                        $('#modalDelete').modal('hide');
                        var message2 = '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        message2 += '   <span aria-hidden="true">&times;</span> </button> Skasowano wpis. </div>';
                        $('#meesage').html(message2);
                        console.log('wszystko dobrze');
                    },

                    error: function (xhr) {
                        if (xhr.status == 405) {
                            console.log(xhr);
                            $("#row-" + id_questbook).remove();

                            $('#modalDelete').modal('hide');
                            var message2 = '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                            message2 += '   <span aria-hidden="true">&times;</span> </button> Skasowano wpis. </div>';
                            $('#meesage').html(message2);

                        }
                        console.log('Error:', 'coś poszło nie tak :' + url + '/' + id_questbook + ' - ' + xhr);
                    }
                });
            })

        })
    </script>

@endsection