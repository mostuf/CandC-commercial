function modalAlert(titre,message)
{
  $("#alertModal .modal-title").html(titre);
  $("#alertModal .modal-body").html(message);
  $("#alertModal").modal("show");
}

function modalConfirm(titre,message,callback)
{
    $("#confirmModal .modal-title").html(titre);
    $("#confirmModal .modal-body").html(message);
    $("#confirmModal").modal("show");
    $("#confirmModal #confirmButton").one("click",function(){
        callback();
    });
    $("#confirmModal #cancelButton").one("click",function(){
        $("#confirmModal #confirmButton").off("click");
    });
}

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});