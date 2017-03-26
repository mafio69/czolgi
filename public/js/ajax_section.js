/**
 * Created by mf196 on 11.03.2017.
 */
$(document).ready(function () {
  var url ='/admin/dzialy'

    $(document).on('click',"#btn-save",(function (e) {
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
                task += '<td><button  href="/admin/dzialy/' + data.id + '/edit"  class="btn btn-outline-warning edit-dzial btn-sm" value="' + data.id + '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edytuj</button></td>';
                task += '<td><button value="' + data.id + '" href="/admin/dzialy/' + data.id + '" class="btn btn-outline-danger btn-sm delete-dzial"><i class="fa fa-trash-o" aria-hidden="true"></i> Usuń</button></td></tr>';

              
                $('#tableSection').append(task);
                

                $('#formCreate').trigger("reset");

                $('#myModalDodaj').modal('hide')
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
    }));

   $(document).on('click','.edit-dzial',function (e) {
      e.preventDefault();
       var sec_id = $(this).val();
        $('#opcje').html('');
       //console.log(sec_id);
       $.get(url + '/' + sec_id, function (data) {
           //success data
           //console.log(data);
           $('#frmTasks').attr('action', '/artykuly/' + data.id);
           $('#task_id').val(data.id);
           $('#nazwaEdit').val(data.nazwa);
           $('#opisEdit').val(data.opis);
           $('#section_id').val(sec_id);
           var opcje = '<select id="overriding_id" class="form-control" name="overriding_id">';
          
           //console.log(data);
            data.over.forEach(function (element) {
                //console.log(element);
                opcje += '<option ';
                 if(element.id == data.overriding_id)
                 {
                     opcje += ' selected ';
                     //console.log(element.id + ' = '+data.overriding_id);
                 }
                opcje += 'value="'+element.id +'">'+element.nazwa+'</option>';
                
            })
                   opcje += '</select>';
            $('#opcje').append(opcje);
           $('#myModalEdit').modal('show');
       })

   })

   $(document).on('click','#btn-save-edit',function(e){
    e.preventDefault();

    var section_id = $('#section_id').val();
    var my_url = url +'/'+ section_id;
    //console.log(my_url);
     var formData = {
            'nazwa': $('#nazwaEdit').val(),
            'opis': $('#opisEdit').val(),
            'overriding_id': $('#overriding_id').val(),
            '_token': $('input[name=_token]').val(),
             };
            
     $.ajax({
            type: 'PUT',
            url: my_url,
            data: formData,
            dataType: 'json',
             success: function (data) {
               
                var task = '<tr id="row-' + data.id + '"><td>' + data.id + '</td><td>' + data.nazwa + '</td><td>' + data.overrding_nazwa + '</td><td>' + data.opis + '</td>';
                task += '<td><button  href="/admin/dzialy/' + data.id + '/edit" class="btn btn-outline-warning edit-dzial btn-sm" value="' + data.id + '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edytuj</button></td>';
                task += '<td><button value="' + data.id + '" href="/admin/dzialy/' + data.id + '" class="btn btn-outline-danger btn-sm delete-dzial" id="usun"><i class="fa fa-trash-o" aria-hidden="true"></i> Usuń</button></td></tr>';
                
                $("#row-" +section_id).replaceWith(task);
                $('#formEdit').trigger("reset");
                $('#opcje').replaceWith('');
                $('#myModalEdit').modal('hide')
            },
                 error: function (xhr) {
                if (xhr.status == 422) {
                    //process validation errors here.
                    var errors =jQuery.parseJSON(xhr.responseText);//this will get the errors response data.
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
                    var errors =jQuery.parseJSON(xhr.responseText);
                    console.log('Error:', errors);
                }
            }

     })        

   });

});
