@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    <a href="{{url('/admin/artykuly/create')}}" class="btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj artykuł</a>
    <table class="table table-striped table-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>Dział</th>
            <th>Tytuł</th>
            <th>Treść</th>
            <th>Data artykułu</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr id="row-{{$article->id}}">
                <th scope="row">{{$i++}}</th>
                <td>{{$article->section->nazwa}}</td>
                <td>{{$article->tytulArt}}</td>
                <td>{{many_word($article->tekstArt,250)}}</td>
                <td>{{$article->dataArt}}</td>
                <td>
                    <a href="{{url('/admin/artykuly/'.$article->id).'/edit'}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj</a>
                </td>
                <td>
                    <form method="post" action="{{url('/admin/artykuly/'.$article->id)}}">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <button type="submit" value="{{$article->id}}" class="btn btn-outline-danger delete-art btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Usuń
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@include('admin.layouts.modalDelete')
@section('scripts')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <script>
        var url = '/admin/artykuly'
        $('.delete-art').click(function (e) {
            e.preventDefault();
            var art_id = $(this).val();
            $.get(url + '/' + art_id, function (data) {
                //success data
                console.log(data);
                $('#frmTasks').attr('action', '/artykuly/' + data.id);
                $('#task_id').val(data.id);
                $('#tytulArt').text(data.tytulArt);
                $('#deleteArt').val(art_id);


                $('#myModal').modal('show');
            })
        });
        //delete task and remove it from list
        $('#deleteArt').click(function (e) {
            var art_id = $(this).val();
            e.preventDefault();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: "DELETE",
                url: url + '/' + art_id,

                success: function (data) {
                    console.log(data);
                    $("#row-" + art_id).remove();
                    $('#myModal').modal('hide');
                },

                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    </script>

@endsection