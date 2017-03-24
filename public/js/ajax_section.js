/**
 * Created by mf196 on 11.03.2017.
 */
var url ='/admin/dzialy'
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
                task += '<td><button  href="/admin/dzialy/' + data.id + '/edit" class="btn btn-outline-primary btn-sm" value="' + data.id + '">Edytuj</button></td>';
                task += '<td><button value="' + data.id + '" href="/admin/dzialy/' + data.id + '" class="btn btn-outline-danger btn-sm delete_dzial">Usuń</button></td></tr>';

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

   $('.edit-dzial').on('click',function (e) {
      e.preventDefault();
       var sec_id = $(this).val();
       console.log(sec_id);
       $.get(url + '/' + sec_id, function (data) {
           //success data
           console.log(data);
           $('#frmTasks').attr('action', '/artykuly/' + data.id);
           $('#task_id').val(data.id);
           $('#nazwaEdit').val(data.nazwa);
           $('#opisEdit').val(data.opis);
           $('#deleteArt').val(sec_id);
           var opcje = '<select id="overrding_id" class="form-control" name="overrding_id">';
           var i=0;
           console.log(data);
            data.over.forEach(function (element) {
                console.log(element);
                opcje += '<option ';
                 if(element.id == data.overriding_id)
                 {
                     opcje += ' selected ';
                     console.log(element.id + ' = '+data.overriding_id);
                 }
                opcje += 'value="'+element.id +'">'+element.nazwa+'</option>';
                i++;
            })
                   opcje += '</select>';
            $('#opcje').append(opcje);
           $('#myModalEdit').modal('show');
       })

   })




});
