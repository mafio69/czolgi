@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    {{$comments}}
    <table class="table table-responsive table-striped">
        <tr>
            <th>Lp.</th>
            <th>Tytuł</th>
            <th>Treść</th>
            <th>Autor</th>
            <th>Aprobata</th>
            <th>Usuń</th>

        </tr>
        @foreach($comments as $comment)
            <tr id="row-{{$comment->id}}">
                <td>{{$loop->index+1}} - {{$comment->id}}</td>
                <td style="white-space: pre-line;"><b>Należy: {{$comment->Gallery->nazwaGaleria}}</b> <br>
                    Tytuł: {{$comment->tytulKom}}
                </td>
                <td>{{$comment->tekstKom}}</td>
                <td>{{$comment->autorKom . ' '.$comment->mailKom}}</td>
                <td style="white-space: nowrap;">
                    <form action="admin/komentarze/{{$comment->id}}/zmien" method="post">
                        {{csrf_field()}}
                        <div class="form-check ">
                            <button class="btn btn-outline-primary btn-change btn-sm" type="submit"
                                    value="{{$comment->id}}"><i class="fa fa-eye-slash" aria-hidden="true"></i> Zmień
                            </button>
                        </div>
                        <div class="form-check ">
                            <label class="form-check-label">
                                <input class="form-check-input choice" type="radio"
                                       {{$comment->aprobataKom == null ? 'checked' : ''}} name="aprobataKom"
                                       id="aprobataKom1"
                                       value=""> nie widoczny
                            </label>
                        </div>
                        <div class="form-check ">
                            <label class="form-check-label">
                                <input class="form-check-input choice"
                                       {{$comment->aprobataKom > 0 ? 'checked' : ''}} type="radio" name="aprobataKom"
                                       id="aprobataKom2" value="1"> widoczny
                            </label>

                        </div>

                    </form>
                </td>
                <td>
                    <form>
                        {{csrf_field()}}
                        <input type="hidden" id="tekstKomD{{$comment->id}}"
                               value="{{ many_word($comment->tekstKom,220)}}">
                        <input type="hidden" id="autorKomD{{$comment->id}}" value="{{$comment->autorKom}}">
                        <button class="btn btn-delete btn-sm btn-outline-danger" value="{{$comment->id}}"><i
                                    class="fa fa-trash" aria-hidden="true"></i> Usuń
                        </button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
    {{$comments}}
@endsection
@include('admin.CommentGalleries.includes.delete')
@section('scripts')
    <script>
        var url = "/admin/komentarze"
        $(function () {
            $(document).on('click', '.btn-change', function (e) {

                e.preventDefault();
                var id_comment = $(this).val();

                var formData = {
                    '_token': $('input[name=_token]').val(),
                    'aprobataKom': $('.choice:checked').val(),
                };
                console.log(formData);
                $.post(url + '/' + id_comment + '/zmien', formData)
                    .done(function (data) {
                        var aprobata = "nie widoczny";
                        if (data.aprobataKom > 0) {
                            aprobata = "widoczny";
                        }
                        var message = '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        message += '   <span aria-hidden="true">&times;</span> </button> Zmieniono widoczność na :<b> ' + aprobata + '</b> </div>';
                        $('#meesage').html(message);
                        console.log("Zmieniono widoczność komentarza." + data);
                    }).fail(function () {
                    alert("Nie udało sie zmienić widoczności komentarza");
                });

            })

            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                var id_comment = $(this).val();

                var tekstKom = $('#tekstKomD' + id_comment).val();
                var autorKom = $('#autorKomD' + id_comment).val();


                $('#tekstKom').text(tekstKom);
                $('#autorKom').text(autorKom);
                $('#delete').val(id_comment);

                console.log(url + ' / ' + id_comment);
                $('#modalDelete').modal('show');
            });
            $(document).on('click', '#delete', function (e) {
                e.preventDefault();
                var formData = {'_token': $('input[name=_token]').val()};
                id_comment = $(this).val();
                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: "DELETE",
                    url: url + '/' + id_comment,
                    data: formData,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        $("#row-" + id_comment).remove();

                        $('#modalDelete').modal('hide');
                        var message2 = '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        message2 += '   <span aria-hidden="true">&times;</span> </button> Skasowano wpis. </div>';
                        $('#meesage').html(message2);
                        console.log('wszystko dobrze');
                    },

                    error: function (xhr) {
                        if (xhr.status == 405) {
                            console.log(xhr);
                            $("#row-" + id_comment).remove();

                            $('#modalDelete').modal('hide');
                            var message2 = '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                            message2 += '   <span aria-hidden="true">&times;</span> </button> Skasowano wpis. </div>';
                            $('#meesage').html(message2);

                        }
                        console.log('Error:', 'coś poszło nie tak :' + url + '/' + id_comment + ' - ' + xhr);
                    }
                });
            })

        })
    </script>

@endsection