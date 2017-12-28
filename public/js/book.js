/**
 * Created by Mariusz on 2017-05-30.
 */

 function check() {
    "use strict";

    if (typeof Symbol == "undefined") return false;
    try {
        eval("class Foo {}");
        eval("var bar = (x) => x+1");
    } catch (e) { return false; }

    return true;
}

 if (check()) {
    // The engine supports ES6 features you want to use
   console.log('Jest ECMA 6');

} else {
     $('#bookInfo').modal('show');
}
$(function () {
    "use strict";
    $(document).on('click', '#bookSave', function (e) {
        var formData, data, errors, url = '/ksiega/add';
        e.preventDefault();

        formData = {
            'imieKsiega': $('#imieKsiega').val(),
            'dataKsiega': $('#dataKsiega').val(),
            'mailKsiega': $('#mailKsiega').val(),
            'wwwKsiega': $('#wwwKsiega').val(),
            'trescKsiega': $('#trescKsiega').val(),
            '_token': $('input[name=_token]').val()
        };
        var jason = 'json';
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: jason,
            success: function (data) {
                //console.log(data);
                function generuj(item) {
                    return `    
             <div class="card-inverse ">
                            <div class="card-header">
                                <h3>${item.imieKsiega}</h3>
                            </div>
                            <div class="card-block">
                                <h4 class="card-title"></h4>
                                <p class="card-text">${item.trescKsiega} </p>
                                <div class="text-sm-right  male">${item.dataKsiega} | ${item.wwwKsiega} </div>
                                <hr>
                            </div>
            </div>`;
                }

                var htmlTag = generuj(data);
                $("#contentBook").prepend(htmlTag);
                $('#formBook').trigger("reset");
                $('#BookModal').modal('hide');
                $('#book-errors').html('');
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
                    $('#book-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
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


