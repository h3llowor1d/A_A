
$("#notice").on('hide.bs.modal',function(){
    if($("#notice").attr("data-jump") !== "false"){
        window.location = $("#notice").attr("data-jump");
    }else if($("#notice").attr("data-refresh") !== "false"){
        window.location = location;
    }
});

var notice = function(msg,fresh,jump){
    var f = fresh || false;
    $("#notice").attr('data-refresh',f);
    $("#notice").attr('data-jump',jump);
    $("#notice .modal-body h3").html(msg);
    $("#notice").modal();
}