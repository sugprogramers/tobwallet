function showAlert(type, msg){
    var tpl ='<div class="alert '+ type+'">'+
            '<a href="#" class="close" data-dismiss="alert" aria_label="close">&times</a>'+
            '<span>'+msg+'</span>'+
            '</div>';
    $("#alertContent").html(tpl);
}

function showDialogAlert(type, msg){
    var tpl ='<div class="alert '+ type+'">'+
            '<a href="#" class="close" data-dismiss="alert" aria_label="close">&times</a>'+
            '<span>'+msg+'</span>'+
            '</div>';
    $("#alertDialogContent").html(tpl);
}
