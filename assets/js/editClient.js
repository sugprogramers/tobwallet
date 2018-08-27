
(function (document, window, $) {
    'use strict';

    var Site = window.Site;

    $(document).ready(function ($) {
        Site.run();
    });


    $('.pearl a[href="#basicInformationTab"]').on('show.bs.tab', function () {
        $(".pearl").removeClass("current");
        $(this).parent().prevAll('.pearl').addClass("current");
        $(this).parent().addClass("current");
    });
    $('.pearl a[href="#loansTab"]').on('show.bs.tab', function () {
        $('.pearl').removeClass("current");
        $(this).parent().prevAll('.pearl').addClass("current");
        $(this).parent().addClass("current");

    });
    $('.pearl a[href="#contractsAndPaymentsTab"]').on('show.bs.tab', function () {
        $('.pearl').removeClass("current");
        $(this).parent().prevAll('.pearl').addClass("current");
        $(this).parent().addClass("current");
    });
    $('.pearl a[href="#stepsTab"]').on('show.bs.tab', function () {
        $('.pearl').removeClass("current");
        $(this).parent().prevAll('.pearl').addClass("current");
        $(this).parent().addClass("current");
    });


    $('#sidebarUploadPoi').on('shown.bs.modal', function () {
        initialize_popup();
        console.log('open');
    });

})(document, window, jQuery);




function readFile() {
    var x = document.getElementById("poiUpload");
    var txt = "";
    if ('files' in x) {
        if (x.files.length == 0) {
            txt = "Select one or more files.";
        } else {
            for (var i = 0; i < x.files.length; i++) {
                txt += "<br><strong>" + (i + 1) + ". file</strong><br>";
                var file = x.files[i];
                if ('name' in file) {
                    txt += "name: " + file.name + "<br>";
                }
                if ('size' in file) {
                    txt += "size: " + file.size + " bytes <br>";
                }
            }
        }
    }
    else {
        if (x.value == "") {
            txt += "Select one or more files.";
        } else {
            txt += "The files property is not supported by your browser!";
            txt += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead.
        }
    }
    console.log(txt);
}


function uploadPoi(clientId, urlPost, poiDesc, uploadedBy, formId) {
    var file_data = $('#poiUpload').prop('files')[0];
    var form_data = new FormData();
    form_data.append('poi_file', file_data);
    form_data.append('client_id', clientId);
    form_data.append('poi_description', poiDesc);
    form_data.append('uploaded_by', uploadedBy);

    $.ajax({
        url: urlPost, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response) {
            console.log(response.success); // display response from the PHP script, if any
            if (response.success) {
                showSuccess('Your POI has been uploaded correctly!');
                qc.pA(formId, 'reloadDatagridPoi', 'QClickEvent', true, 'waitIconEditClient');
            } else {
                showWarning('There was an error trying to upload this file. Please, try later.');
            }

        }
    });

}

function initialize_popup() {
    $('.poi-popup-link').magnificPopup({
        type: 'image'
    });
}
