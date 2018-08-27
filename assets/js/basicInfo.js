
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

    /// Disable click on tabs
    $('.pearl a[data-toggle=tab]').attr('class', 'disabled');
    $('.pearl a[data-toggle=tab]').on('click', function (e) {
        if ($(this).hasClass("disabled")) {
            e.preventDefault();
            return false;
        }
    });

    $('.substeps li a[data-toggle=tab]').attr('class', 'disabled');
    $('.substeps li a[data-toggle=tab]').on('click', function (e) {
        if ($(this).hasClass("disabled")) {
            e.preventDefault();
            return false;
        }
    });



//    // Javascript to enable link to tab
//    var url = document.location.toString();
//    if (url.match('#')) {
//        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
//    }
//
//    // Change hash for page-reload
//    $('.nav-tabs a').on('shown.bs.tab', function (e) {
//        window.location.hash = e.target.hash;
//    });

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

var intSelectedIndex = -1;
var objSelectedLabel;
var intCurrentStep = 0;
var intcurrentSubStep = 0;
var arrayStepTabs = ["basicInformationTab", "loansTab"];


function nextStepClick(objControl) {

    var strControlId = objControl.id,
            intIndex = strControlId.substr(5),
            objTextbox;


    ++intcurrentSubStep;

    if (intcurrentSubStep > 2) {
        ++intCurrentStep;

        if (intCurrentStep > (arrayStepTabs.length - 1)) {
            --intCurrentStep;
        }

        console.log(arrayStepTabs[intCurrentStep]);

        if (intCurrentStep === 0) {
            $('.pearl a[href="#basicInformationTab"]').tab('show');
        }

        if (intCurrentStep === 1) {
            $('.pearl a[href="#loansTab"]').tab('show');
        }
    } else {
        $('.substeps li a[href="#step' + intcurrentSubStep + '"]').tab('show');
    }

    if (intCurrentStep === 0 && intcurrentSubStep === 0) {
        document.getElementById("btnBackStep").disabled = true;
    } else {
        document.getElementById("btnBackStep").disabled = false;
    }

    if (intCurrentStep === (arrayStepTabs.length - 1)) {
        
        // Gets the wrapper control
        qc.getW('btnContinue').toggleDisplay('show');
        qc.getW(strControlId).toggleDisplay('hide');
    }

    return;

    // Is the Label being clicked already selected?
    if (intSelectedIndex == intIndex) {
        // It's already selected -- go ahead and replace it with the textbox
        qc.getW(strControlId).toggleDisplay('hide');
        qc.getW('textbox' + intIndex).toggleDisplay('show');

        objTextbox = qcubed.getControl('textbox' + intIndex);
        objTextbox.value = objControl.innerHTML;
        objTextbox.focus();
        objTextbox.select();
    } else {
        // Nope -- not yet selected

        // First, unselect everything else
        if (objSelectedLabel) {
            objSelectedLabel.className = 'renamer_item';
        }
        // Now, make this item selected
        objControl.className = 'renamer_item renamer_item_selected';
        objSelectedLabel = objControl;
        intSelectedIndex = intIndex;
    }
}


function backStepClick(objControl) {
    var strControlId = objControl.id;

    if (intCurrentStep === 1) {
        intcurrentSubStep = 2;
    } else {
        --intcurrentSubStep;
    }
    --intCurrentStep;

    if (intCurrentStep < 0) {
        intCurrentStep = 0;
    }

    if (intcurrentSubStep < 0) {
        intcurrentSubStep = 0;
    }

    if (intCurrentStep === 0) {
        $('.pearl a[href="#basicInformationTab"]').tab('show');
        $('.substeps li a[href="#step' + intcurrentSubStep + '"]').tab('show');
    }

    if (intCurrentStep === 1) {
        $('.pearl a[href="#loansTab"]').tab('show');

    }

    if (intCurrentStep === 0 && intcurrentSubStep === 0) {
        document.getElementById("btnBackStep").disabled = true;
    } else {
        document.getElementById("btnBackStep").disabled = false;
    }

    if (intCurrentStep < (arrayStepTabs.length - 1)) {
      
        // Gets the wrapper control
        qc.getW('btnContinue').toggleDisplay('hide');
        qc.getW('btnNextStep').toggleDisplay('show');
    }

}

