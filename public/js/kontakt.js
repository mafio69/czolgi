/**
 * Created by Mariusz on 2017-05-30.
 */
$(function () {
    "use strict";
    $(document).on('click', '#btn-kontakt', function (e) {
        var formData, data, errors, dat, url = '/kontakt';

        formData = {
            'email': $('#email').val(),
            'tresc': $('#tresc').val(),
            '_token': $('input[name=_token]').val(),
             };
        var jason = 'json';
        //console.log(formData);
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: jason,
            success: function (data) {
                //console.log(data);
                $('#formKontakt').trigger("reset");
                $('#kontaktModal').modal('hide');
                //console.log(htmlTag);
                var message = data;
                console.log(message);

               var  tekst ='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">X</span> </button>' + message + '</div>'
                console.log(tekst);
                $('#message').html(tekst);
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    //process validation errors here.
                    errors = jQuery.parseJSON(xhr.responseText); //this will get the errors response data.
                    //show them somewhere in the markup
                    //e.g
                    console.log(errors);
                    var errorsHtml = '<div class="alert alert-danger"><ul class="list-group">';
                    $.each(errors, function (key, value) {
                        errorsHtml += '<li class="list-group-item">' + value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></di>';
                    $('#form-errorsK').html(errorsHtml); //appending to a <div id="form-errorsK"></div> inside form
                } else {
                    errors = jQuery.parseJSON(xhr.responseText);
                    console.log(xhr.responseText);
                    console.log('Error:', errors);
                    console.log('Error:', data);
                }
            }
        });
    });
});


