$('.pearl a[data-toggle=tab]').attr('class', 'disabled');
$('.pearl a[data-toggle=tab]').on('click', function (e) {
    if ($(this).hasClass("disabled")) {
        e.preventDefault();
        return false;
    }
});


$('.pearl a').on('show.bs.tab', function () {
    console.log(this.getAttribute("href"));
    $(".pearl").removeClass("current");
    $(this).parent().prevAll('.pearl').addClass("current");
    $(this).parent().addClass("current");

});

function moveRegister(urlStep) {
    $('.pearl a[href="#' + urlStep + '"]').tab('show');

}

function initSsnInputMask() {
    $('#RegisterClientForm').find('[name="inputSsn"]').mask('999-99-9999');


}


function openModalsRegister(val) {
    if (val == 'createfsa') {
        $('#modal-how-to-create-fsa-account').modal('show');
    }
    if (val == 'success-register') {
        $('#success-register').modal('show');
    }

}


