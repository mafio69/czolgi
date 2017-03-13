/**
 * Created by mf196 on 11.03.2017.
 */
var url ='/dzialy'
$(document).ready(function () {
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();

        var formData = {
            nazwa: $('#nazwa').val(),
            opis: $('#opis').val(),
            overriding_id: $('#overriding').val(),
             }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = 'add';

        var type = "POST"; //for creating new resource
        var id = $('#dzial_id').val();
        var my_url = url;

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var task = '<tr id="row-' + data.id + '"><td>' + data.id + '</td><td>' + data.nazwa + '</td><td>' + data.overrding_nazwa + '</td><td>' + data.nazwa + '</td>';
                task += '<td><button  href="/dzialy/' + data.id + '/edit" class="btn btn-outline-primary btn-sm" value="' + data.id + '">Edytuj</button>';
                task += ' <button value="' + data.id + '" href="/dzialy/' + data.id + '" class="btn btn-outline-danger btn-sm delete_dzial">Usuń</button></td></tr>';

                if (state == "add") { //if user added a new record
                    $('#tableSection').append(task);
                } else { //if user updated an existing record

                    $("#task" +id).replaceWith(task);
                }

                $('#addSection').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (xhr) {
                if (xhr.status == 422) {
                    //process validation errors here.
                    var errors =jQuery.parseJSON(xhr.responseText);//this will get the errors response data.
                    //show them somewhere in the markup
                    //e.g
                    alert(xhr);
                    console.log(errors);
                    var errorsHtml = '<div class="alert alert-danger"><ul class="list-group">';

                    $.each(errors, function (key, value) {
                        errorsHtml += '<li class="list-group-item">' + value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></di>';

                    $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
                } else {
                    var errors =jQuery.parseJSON(xhr.responseText);
                    console.log('Error:', errors);
                }
            }
        });
    });

    $('.delete_dzial').click(function () {


        var task_id = $(this).val();

        $.ajax({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            },
            type: "DELETE",
            url: url + '/' + task_id,
            success: function (data) {
                console.log(data);

                $("#row-" + task_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
