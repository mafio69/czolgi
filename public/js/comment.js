/**
 * Created by Mariusz on 2017-05-30.
 */
$(function () {
    "use strict";
    $(document).on('click', '#btn-save', function (e) {
        var dzien, miesiac, godzina, minuty, formData, data, errors, dat, url = '/komentarze/add';
        e.preventDefault();
        data = new Date();
        if (data.getDate() < 10) {
            dzien = '0' + data.getDate();
        } else {
            dzien = data.getDate();
        }
        if (data.getMonth() < 10) {
            miesiac = '0' + (data.getMonth() + 1);
        } else {
            miesiac = data.getMonth() + 1;
        }
        if (data.getHours() < 10) {
            godzina = '0' + data.getHours();
        } else {
            godzina = data.getHours();
        }
        if (data.getMinutes() < 10) {
            minuty = '0' + data.getMinutes();
        } else {
            minuty = data.getMinutes();
        }
        dat = data.getFullYear() + '-' + miesiac + '-' + dzien + ' ' + godzina + ':' +
            minuty + ':' + '00';
        formData = {
            'tytulKom': $('#tytulKom').val(),
            'tekstKom': $('#tekstKom').val(),
            'autorKom': $('#autorKom').val(),
            'galleries_id': $('#galleries_id').val(),
            '_token': $('input[name=_token]').val(),
            'dataKom': dat
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
                function generuj(item) {
                    return '<div class="card-inverse">' +
                        '<div class="card-header">' + item.tytulKom +
                        '</div> <div class="card-block"><p class="card-text">' + item.tekstKom +
                        '</p><br> <div class="text-right">' + item.autorKom + '<br>' + item.dataKom +
                        '</div> </div></div> ';
                }

                var htmlTag = generuj(data);
                $("#comments").prepend(htmlTag);
                $('#form').trigger("reset");
                $('#myModal').modal('hide');
                //console.log(htmlTag);
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
                    $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
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


