@extends('admin.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalDodaj">
        Dodaj dział
    </button>



    <table id="tableSection" class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nazwa</th>
            <th>Nadrzędny dział</th>
            <th>Opis</th>
            <th>Akcja</th>
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
                    <button href="/admin/dzialy/{{$section->id}}/edit" value="{{$section->id}}" class="btn btn-outline-primary edit-dzial btn-sm">Edytuj</button>

                </td>
                <td>
                    <button value="{{$section->id}}" href="/admin/dzialy/{{$section->id}}" class="btn btn-outline-danger btn-sm delete-dzial" id="usun">Usuń</button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection

@include('admin.layouts.modalDelete')
@include('admin.layouts.modalDodajSection')
@include('admin.layouts.modalEditSection')

@section('scripts')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <script src="{{ asset('js/ajax_section.js') }}"></script>
    <script>
        var url = '/admin/dzialy';
        $('.delete-dzial').click(function (e) {
            e.preventDefault();
            var sec_id = $(this).val();
            $.get(url + '/' + sec_id, function (data) {
                //success data
                console.log(data);
                $('#frmTasks').attr('action', '/artykuly/' + data.id);
                $('#task_id').val(data.id);
                $('#tytulArt').text(data.nazwa);
                $('#deleteArt').val(sec_id);


                $('#myModal').modal('show');
            })
        });
        //delete task and remove it from list
        $('#deleteArt').click(function (e) {
            var sec_id = $(this).val();
            e.preventDefault();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: "DELETE",
                url: url + '/' + sec_id,

                success: function (data) {
                    console.log(data);
                    $("#row-" + sec_id).remove();
                    $('#myModal').modal('hide');
                },

                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    </script>


@endsection